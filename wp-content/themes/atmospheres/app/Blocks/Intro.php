<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Intro extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Intro';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Intro block.';

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
            'subtitle' => $this->subtitle(),
            'info_left' => $this->info_left(),
            'info_right' => $this->info_right(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $intro = new FieldsBuilder('intro');

        $intro
            ->addText('subtitle')
            ->addWysiwyg('info_left')
            ->addWysiwyg('info_right');

        return $intro->build();
    }

    /**
     * Return the subtitle field.
     *
     * @return array
     */
    public function subtitle()
    {
        return get_field('subtitle') ?: false;
    }

    /**
     * Return the info_left field.
     *
     * @return array
     */
    public function info_left()
    {
        return get_field('info_left') ?: false;
    }

    /**
     * Return the info_right field.
     *
     * @return array
     */
    public function info_right()
    {
        return get_field('info_right') ?: false;
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
