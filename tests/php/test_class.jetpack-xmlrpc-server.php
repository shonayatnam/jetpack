<?php

require_once dirname( __FILE__ ) . '/../../class.jetpack-xmlrpc-server.php';

class WP_Test_Jetpack_XMLRPC_Server extends WP_UnitTestCase {
	function test_xmlrpc_get_posts() {
		$server = new Jetpack_XMLRPC_Server();
		$post_ids = array();

		$post_ids[] = $this->factory->post->create();
		$post_ids[] = $this->factory->post->create();
		$post_ids[] = $this->factory->post->create();

		$posts = $server->get_posts( $post_ids );
	}
}
	