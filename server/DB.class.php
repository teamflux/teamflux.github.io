<?php
class DB{
	private $dbh;

    //set up database object
    function __construct(){
		try{
			$this->dbh = new pdo("mysql:HOST={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",
			$_SERVER['DB_USER'],
			$_SERVER['DB_PASSWORD']);
			
			//change error reporting
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			
        }
    } //constructor

    //get data for all items in database
    function getAllItems(){
        return $this->getData("select * from proj1_products");
    }//getAllItems

    //get data for selected item
    function getEditItem($id){
        return $this->getData("select * from proj1_products where ID=".$id)[0];
    }//getEditItem

    //edit item data in catalog
    function editItem($id,$name,$desc,$quant,$price,$salePrice,$img){
        try{
            $stmt = $this->dbh->prepare("update proj1_products set ItemName='$name', Description='$desc', Quantity=$quant, Price='$price', SalePrice='$salePrice', Image='$img' where ID=$id");
            $stmt->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }//editItem

    //add item to catalog
    function addItem($name,$desc,$quant,$price,$salePrice,$img){
        try{
            $stmt = $this->dbh->prepare("insert into proj1_products (ItemName,Description,Quantity,Price,SalePrice,Image) values ('$name','$desc','$quant','$price','$salePrice','$img')");
            $stmt->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }//addItem

    //get all items from cart table
    function getCartItems(){
        return $this->getData("select * from proj1_products inner join proj1_cart on (proj1_products.ID = proj1_cart.ID)");
    }

    //add item to the cart
    function addToCart($id){
        try{
            $stmt = $this->dbh->prepare("select * from proj1_products where ID=".$id);
            $stmt->execute();
            $quant = $stmt->fetch()[6];
            if($quant > 0){

                //subtract quantity from catalog
                $quant--;
                $stmt = $this->dbh->prepare("update proj1_products set Quantity=".$quant." where ID=".$id);
                $stmt->execute();

                //get selected cart item
                $stmt = $this->dbh->prepare("select * from proj1_cart where ID=".$id);
                $stmt->execute();

                if(count($stmt) > 0){
                    $cartQuant = $stmt->fetch()[1];

                    //add to quantity if item is already in cart
                    if($cartQuant > 0){
                        $cartQuant++;
                        $stmt = $this->dbh->prepare("update proj1_cart set Quantity=".$cartQuant." where ID=".$id);
                        $stmt->execute();
                    }
                    //add item to cart
                    else{
                        $stmt = $this->dbh->prepare("insert into proj1_cart(ID) values (:id)");
                        $stmt->execute(array("id"=>$id));
                    }
                }
            }
            else{
                echo "No more in stock";
            }

        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }//addToCart

    //empty the cart
    function clearCart(){
    	try{
            $stmt = $this->dbh->prepare("truncate table proj1_cart");
            $stmt->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    //helper function to retrieve data from database
    function getData($stmt){
        try{
            $data = array();
            $stmt = $this->dbh->prepare($stmt);
            $stmt->execute();
            $stmt->setFetchMode(pdo::FETCH_CLASS,"Item");
            while($item = $stmt->fetch()){
                $data[] = $item;  
            }
            return $data;
        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

}
?>