<?php
/*
  Controller Class - UsersFurniture for displaying furnitures to the users
*/

  class UsersFurniture extends Controller{

    //member variable selectedCategory
    private $selectedCategory = "";

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Calls the member function createFurnitureContent
    */
    public function index(){
      $this->createFurnitureContent();
    }

////////////////////////////////////////////////////////////////////////////////

    /** The products function
    * Calls the member function createFurnitureContent
    * Also provides the category selected to the called function
    */
    public function products($categoryId=""){
      if (empty($categoryId)) {
        header("Location: /Assignment/public/Admin/NotFound");
      }
      $this->createFurnitureContent($categoryId);
    }


////////////////////////////////////////////////////////////////////////////////

    /** The search function
    * Calls the member function createFurnitureContent
    * Also provides the category selected to the called function
    */
    public function search($query=""){
        require_once 'UsersFurniture/showSearchContent.php';
        echo $content;
    }

////////////////////////////////////////////////////////////////////////////////


    /** The createFurnitureContent function
    * Sets up the view to display the furnitures
    */
    public function createFurnitureContent($categoryId=""){
      require_once 'UsersFurniture/showFurnitureContent.php';
      $allCategories = $category->findAll();
      //Load furnitures template
      $fileName = '../templates/UsersFurnitureTemplate.php';
      $contents = [
        'allCategories'=>$allCategories,
        'content'=>$content
      ];
      $content = loadTemplate($fileName, $contents);

      //Load users template
      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Our Furniture',
        'content'=>$content
      ];

      require_once 'loadview.php';
    }

////////////////////////////////////////////////////////////////////////////////

  /** The createNoSearchContent function
  * Echos the content when search is empty
  */
  public function createNoSearchContent($categoryId=""){
    require_once 'UsersFurniture/showFurnitureContent.php';
    echo $content;
  }

////////////////////////////////////////////////////////////////////////////////





}






?>
