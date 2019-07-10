<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;
use App\Entity\Tag;
use App\Entity\Category;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // create 20 products! Bam!
        for($i = 0; $i < 5; $i++) {
            $tag = new Tag();
            $tag->setName('tag-'.$i);
            $manager->persist($tag);
        }

        for($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName('category-'.$i);
            $category->setDescription('ceci est la category n°: '.$i);
            $manager->persist($category);
        }

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('product-'.$i);
            $product->setDescription('description du product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $manager->persist($product);
        }

        $manager->flush();
    }
}