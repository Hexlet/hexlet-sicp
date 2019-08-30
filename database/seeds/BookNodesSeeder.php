<?php

use Illuminate\Database\Seeder;
use \Symfony\Component\Yaml\Yaml;
use App\BookNode;

class BookNodesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $parentDir = dirname(__DIR__);
        $bookNodes = Yaml::parse(file_get_contents("${parentDir}/fixtures/book_nodes.yml"));

        array_map(function ($bookNodeData) {
            $bookNode = new BookNode($bookNodeData['book_node']);
            $bookNode->save();
        }, $bookNodes);
    }
}
