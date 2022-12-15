<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class IntroInfo extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Intro Info';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Intro Info block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'video' => $this->video(),
            'taglines_1' => $this->taglines_1(),
            'taglines_2' => $this->taglines_2(),
            'countdown_info' => $this->countdown_info(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $introInfo = new FieldsBuilder('intro_info');

        $introInfo
            ->addFile('video', ['label' => 'Background Video'])
            ->addRepeater('taglines_1')
                ->addWysiwyg('tagline')
            ->endRepeater()
            ->addRepeater('taglines_2')
                ->addWysiwyg('tagline')
            ->endRepeater()
            ->addWysiwyg('countdown_info');

        return $introInfo->build();
    }

    /**
     * Return the video field.
     *
     * @return array
     */
    public function video()
    {
        return get_field('video') ?: false;
    }

    /**
     * Return the taglines_1 field.
     *
     * @return array
     */
    public function taglines_1()
    {
        return get_field('taglines_1') ?: false;
    }

    /**
     * Return the taglines_2 field.
     *
     * @return array
     */
    public function taglines_2()
    {
        return get_field('taglines_2') ?: false;
    }

    /**
     * Return the countdown_info field.
     *
     * @return array
     */
    public function countdown_info()
    {
        return get_field('countdown_info') ?: false;
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
