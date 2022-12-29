<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Students extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive-ca_student',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'students' => $this->orderStudents(),
        ];
    }

    /**
     * Returns the upcoming concert data.
     *
     * @return array
     */
    public function orderStudents()
    {
        $posts = get_posts([
            'post_type' => 'ca_student',
            'post_status' => 'publish',
            'numberposts' => -1,
            'order' => 'ASC',
            'orderby' => 'title'
          ]);

          if ($posts) {
            return $posts;
          }

        return false;
    }
}
