<?php
/**
 * Sync architecture prototype
 * @author Dan Walmsley
 * To run tests: phpunit --testsuite sync --filter New_Sync
 */

/**
 * A high-level interface for objects that store synced WordPress data
 * Useful for ensuring that different storage mechanisms implement the
 * required semantics for storing all the data that we sync
 */
interface iJetpack_Sync_Replicastore {
	// posts
	public function post_count( $status = null );
	public function get_posts( $status = null );
	public function get_post( $id );
	public function upsert_post( $post );
	public function delete_post( $post_id );

	// comments
	public function comment_count( $status = null );
	public function get_comments( $status = null );
	public function get_comment( $id );
	public function upsert_comment( $comment );
	public function trash_comment( $comment_id );
	public function spam_comment( $comment_id );
	public function delete_comment( $comment_id );

	// options
	public function update_option( $option, $value );
	public function get_option( $option );
	public function delete_option( $option );

	// themes
	public function set_theme_support( $theme_support );
	public function current_theme_supports( $feature );

	// meta
	public function get_metadata( $meta_type, $object_id, $key, $single = false );
	public function add_metadata( $meta_type, $object_id, $key, $value, $unique = false );
	public function update_metadata( $meta_type, $object_id, $key, $value, $prev_value = null );
	public function delete_metadata( $meta_type, $object_id, $meta_key, $meta_value = '', $delete_all = false );

	// post meta
	public function get_post_meta( $post_id, $meta_key, $single );
	public function add_post_meta( $post_id, $meta_key, $meta_value, $unique );
	public function update_post_meta( $post_id, $meta_key, $meta_value, $prev_value );
	public function delete_post_meta( $post_id, $meta_key, $meta_value );

	// constants
	public function get_constant( $constant );
	public function set_constants( $constants );

}