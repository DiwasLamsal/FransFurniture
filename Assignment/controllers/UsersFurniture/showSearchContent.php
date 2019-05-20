<?php

        // Create instance of DatabaseTable for categories
        $category = new DatabaseTable('category');
        $allCategories = $category->findAll();
        // Create instance of DatabaseTable for furniture
        $furniture = new DatabaseTable('furniture');

        //Separate the url provided with comma
        $queryArray = explode(',', filter_var(rtrim($query, ','), FILTER_SANITIZE_URL));

        //Set the array of all categories
        $catIdArray = [];
        foreach ($allCategories as $cat) {
          array_push($catIdArray,$cat['id']);
        }

        //Reinitialize the allCategories variable
        $allCategories = $category->findAll();

        //If a category is not selected, search among all the furnitures
        if(empty($queryArray[1]) && !in_array($queryArray[0], $catIdArray)){
          $allFurnitures = $furniture->searchSorted('name', $queryArray[0], 'id');
        }
        else{
          //If a category was selected, search only from the provided category
          $selectedCategory = $category->find("id", $queryArray[0])->fetch();
          if(!isset($queryArray[1])){
            $queryArray[1]="";
          }

          $allFurnitures = $furniture->searchSortedWithValue(
                "categoryId",
                $selectedCategory['id'],
                'name',
                $queryArray[1],
                'id'
              );
        }
//--------------------------------LOAD TEMPLATE----------------------------------//

        $contents = [
          'allFurnitures'=>$allFurnitures,
          'search'=>true
        ];

        $fileName = '../views/users/userfurniture/userFurnitureContent.php';
        $content = loadTemplate($fileName, $contents);

?>
