<?php

Class BlogNomic_Title_With_Tags_Only_Tag extends \Elementor\Core\DynamicTags\Tag {
	public function get_name() {
    return 'blognomic-title-with-tags-only';
  }

	public function get_title() {
    return __('BlogNomic title with tags only', 'blognomic-tweaks');
  }

	public function get_group() {
    return 'post';
  }

	public function get_categories() {
    return [ \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY ];
  }

	public function render() {
    $post = get_post();

    $tags = get_the_terms($post, 'post_tag');

    $title_tags = '';

    if(!empty($tags)) {
      $tags = array_map(
        function($tag) {
          return $tag->name;
        },
        $tags
      );

      $title_tags = ' <span style="opacity:0.5">[' . implode(', ', $tags). ']</span>';
    }

    print $post->post_title . $title_tags;
  }
}
