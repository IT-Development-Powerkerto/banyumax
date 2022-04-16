<?php

namespace App\Models;


class Post
{
    private static $blog_post =  [ 
        [
        "title" => "Judul Post Pertama",
        "slug" => "judul-post-pertama",
        "author" => "Rezdian Yursandi",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi sint, ad totam veritatis deleniti molestiae veniam. Quos, tenetur. Voluptatum atque voluptate pariatur qui sapiente tempore quae. Quam iusto quaerat eaque."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Rezdian",
            "body" => "Post kedua Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi sint, ad totam veritatis deleniti molestiae veniam. Quos, tenetur. Voluptatum atque voluptate pariatur qui sapiente tempore quae. Quam iusto quaerat eaque."
            ],
        ];

        public static function all() {
            return collect(self::$blog_post);
        }

        public static function find($slug) {
            $blog_post = static::all();
            
            return $blog_post->firstWhere('slug',$slug);

        }

}
