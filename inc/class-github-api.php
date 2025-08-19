<?php
/**
 * GitHub API Connector
 *
 * @author  Anphira
 * @since   3.0
 * @package Kaya
 * @version 3.0
 */

class GitHub_API {
    private $repo;
    private $cache_key;

    public function __construct($repo) {
        $this->repo = $repo;
        $this->cache_key = 'github_theme_' . md5($repo);
    }

    public function get_repo_url() {
        return "https://github.com/{$this->repo}";
    }

    public function get_latest_version() {
        $release = $this->get_latest_release();
        if (!$release) {
            return false;
        }
        
        // Strip 'v' prefix if present
        $version = $release['tag_name'];
        if (strpos($version, 'v') === 0) {
            $version = substr($version, 1);
        }
        
        return $version;
    }

    public function get_download_url() {
        $release = $this->get_latest_release();
        return $release ? $release['zipball_url'] : false;
    }

    private function get_latest_release() {
        $cached = get_transient($this->cache_key);
        if ($cached !== false) {
            return $cached;
        }

        $url = "https://api.github.com/repos/{$this->repo}/releases/latest";
        $response = wp_remote_get($url, [
            'headers' => [
                'User-Agent' => 'WordPress Theme Updater',
                // Add 'Authorization: token YOUR_TOKEN' for private repos
            ]
        ]);

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return false;
        }

        $release = json_decode(wp_remote_retrieve_body($response), true);
        set_transient($this->cache_key, $release, HOUR_IN_SECONDS);

        return $release;
    }

    public function get_theme_info() {
        $release = $this->get_latest_release();
        
        return (object) [
            'name' => 'Your Theme Name',
            'slug' => basename($this->repo),
            'version' => $release['tag_name'],
            'author' => 'Your Name',
            'homepage' => "https://github.com/{$this->repo}",
            'description' => $release['body'],
            'download_link' => $release['zipball_url']
        ];
    }
}