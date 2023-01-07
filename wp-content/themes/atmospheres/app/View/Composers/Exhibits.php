<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Exhibits extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive-ca_exhibit',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'exhibits' => $this->exhibits(),
        ];
    }

    /**
     * Returns the post exhibits.
     *
     * @return array
     */
    public function exhibits()
    {
        $args = array(
            'numberposts' => -1,
            'post_type'   => 'ca_exhibit',
          );

        $exhibits = get_posts($args) ?: false;

        if ($exhibits) {
          shuffle($exhibits);
        }

        return $exhibits ?: false;
    }
}
