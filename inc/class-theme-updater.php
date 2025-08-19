<?php
/**
 * Theme Updater
 *
 * @author  Anphira
 * @since   3.0
 * @package Kaya
 * @version 3.0.3
 */

class Theme_Updater {
    private $theme_slug;
    private $version;
    private $github_repo;
    private $github_api;

    public function __construct($theme_slug, $version, $github_repo) {
        $this->theme_slug = $theme_slug;
        $this->version = $version;
        $this->github_repo = $github_repo;
        $this->github_api = new GitHub_API($github_repo);
        
        add_filter('pre_set_site_transient_update_themes', [$this, 'check_for_update']);
        add_filter('themes_api', [$this, 'themes_api_call'], 10, 3);
        add_filter('upgrader_source_selection', [$this, 'fix_theme_folder'], 10, 4);
    }

    public function fix_theme_folder($source, $remote_source, $upgrader, $extra) {
        global $wp_filesystem;
        
        // Only process our theme updates
        if (!isset($extra['theme']) || $extra['theme'] !== $this->theme_slug) {
            return $source;
        }

        // Check if source directory exists and contains style.css
        if (!$wp_filesystem->is_dir($source) || !$wp_filesystem->exists($source . 'style.css')) {
            return new WP_Error('incompatible_archive', 'The package could not be installed. The theme is missing the style.css stylesheet.');
        }

        // Expected folder name should match theme slug
        $desired_folder = trailingslashit(dirname($source)) . $this->theme_slug;
        
        // If the folder is already correctly named, return as-is
        if ($source === $desired_folder) {
            return $source;
        }
        
        // Rename the downloaded folder
        if ($wp_filesystem->move($source, $desired_folder)) {
            return $desired_folder;
        }
        
        return new WP_Error('rename_failed', 'Could not rename theme folder to expected name.');
    }

    public function check_for_update($transient) {
        if (empty($transient->checked[$this->theme_slug])) {
            return $transient;
        }

        $remote_version = $this->github_api->get_latest_version();
        
        if (version_compare($this->version, $remote_version, '<')) {
            $transient->response[$this->theme_slug] = [
                'theme' => $this->theme_slug,
                'new_version' => $remote_version,
                'url' => $this->github_api->get_repo_url(),
                'package' => $this->github_api->get_download_url()
            ];
        }

        return $transient;
    }

    public function themes_api_call($result, $action, $args) {
        if ($action !== 'theme_information' || $args->slug !== $this->theme_slug) {
            return $result;
        }

        return $this->github_api->get_theme_info();
    }
}