<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    //User::factory(4)->create();
   //  User::create([
   //      'name'      => "Administrator",
   //      'role_id'   => "1",
   //      'username'  => "admin",
   //      'email'     => "admin@admin.com",
   //      'password'  => Hash::make('1234'),
   //      'remember_token' => Str::random(10),
   //  ]);
  //    User::create([
  //     'name' => "Zahra Zhafira",
  //     'email' => "zahra@gmail.com",
  //     "password" => bcrypt('12345')
  //  ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);


        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
        'name' => 'Coding',
        'slug' => 'coding'
    ]);
    Category::create([
        'name' => 'Graphic Design',
        'slug' => 'graphic-design'
    ]);
    Category::create([
        'name' => 'Digital Marketing',
        'slug' => 'digital-marketing'
    ]);
        Post::factory(25)->create();

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            ProductSeeder::class,
            EventSeeder::class,
            EventWaSeeder::class,
            StatusSeeder::class,
            //ClosingRateSeeder::class,
            IconSeeder::class,
            PaketSeeder::class,
            //CampaignSeeder::class,
            //OperatorSeeder::class,
            //LeadSeeder::class,
        ]);
   //   Post::create([
   //      'title' => 'Judul Pertama',
   //      'slug' => 'judul-pertama',
   //      'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam.',
   //      'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam. Aperiam, facilis? Veniam delectus dolorum labore dicta quae ratione corrupti cum aut, placeat vero perspiciatis suscipit maxime consequatur, autem iure nobis magnam aspernatur culpa laborum blanditiis </p> <p> natus eius ex in fugiat. Eaque deserunt, asperiores commodi dolorem, recusandae maxime eum obcaecati corporis optio laborum numquam? Quas impedit dolorem magni voluptas minima vero ducimus fugiat alias, at assumenda commodi molestias eaque, ratione quisquam veniam debitis explicabo consequatur quaerat reiciendis illum facilis, molestiae dicta? Mollitia neque iste recusandae, consectetur quae libero aspernatur sed?</p>',
   //      'category_id' => 1,
   //      'user_id' => 1
   //   ]);
   //   Post::create([
   //      'title' => 'Judul Kedua',
   //      'slug' => 'judul-kedua',
   //      'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam.',
   //      'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam. Aperiam, facilis? Veniam delectus dolorum labore dicta quae ratione corrupti cum aut, placeat vero perspiciatis suscipit maxime consequatur, autem iure nobis magnam aspernatur culpa laborum blanditiis </p> <p> natus eius ex in fugiat. Eaque deserunt, asperiores commodi dolorem, recusandae maxime eum obcaecati corporis optio laborum numquam? Quas impedit dolorem magni voluptas minima vero ducimus fugiat alias, at assumenda commodi molestias eaque, ratione quisquam veniam debitis explicabo consequatur quaerat reiciendis illum facilis, molestiae dicta? Mollitia neque iste recusandae, consectetur quae libero aspernatur sed?</p>',
   //      'category_id' => 1,
   //      'user_id' => 2
   //   ]);
   //   Post::create([
   //      'title' => 'Judul Ketiga',
   //      'slug' => 'judul-ketiga',
   //      'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam.',
   //      'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam. Aperiam, facilis? Veniam delectus dolorum labore dicta quae ratione corrupti cum aut, placeat vero perspiciatis suscipit maxime consequatur, autem iure nobis magnam aspernatur culpa laborum blanditiis </p> <p> natus eius ex in fugiat. Eaque deserunt, asperiores commodi dolorem, recusandae maxime eum obcaecati corporis optio laborum numquam? Quas impedit dolorem magni voluptas minima vero ducimus fugiat alias, at assumenda commodi molestias eaque, ratione quisquam veniam debitis explicabo consequatur quaerat reiciendis illum facilis, molestiae dicta? Mollitia neque iste recusandae, consectetur quae libero aspernatur sed?</p>',
   //      'category_id' => 2,
   //      'user_id' => 3
   //   ]);
   //   Post::create([
   //      'title' => 'Judul Keempat',
   //      'slug' => 'judul-keempat',
   //      'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam.',
   //      'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Sunt laborum nam natus quae consequuntur voluptatem modi, quam magnam deleniti quisquam. Aperiam, facilis? Veniam delectus dolorum labore dicta quae ratione corrupti cum aut, placeat vero perspiciatis suscipit maxime consequatur, autem iure nobis magnam aspernatur culpa laborum blanditiis </p> <p> natus eius ex in fugiat. Eaque deserunt, asperiores commodi dolorem, recusandae maxime eum obcaecati corporis optio laborum numquam? Quas impedit dolorem magni voluptas minima vero ducimus fugiat alias, at assumenda commodi molestias eaque, ratione quisquam veniam debitis explicabo consequatur quaerat reiciendis illum facilis, molestiae dicta? Mollitia neque iste recusandae, consectetur quae libero aspernatur sed?</p>',
   //      'category_id' => 3,
   //      'user_id' => 4
   //   ]);
    }
}
