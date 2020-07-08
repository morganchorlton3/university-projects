<?php
/**
 * Created by PhpStorm.
 * User: Morgan
 * Date: 16/04/2019
 */

include_once 'Controller.php';

class PurchaseHistoryController extends Controller{

    public static function displayPurchaseHistory(){
        $user = Session::get('AUTH');
        $custID = $user->getUserID();
        $statement  = self::statementQuery("SELECT fss_FilmPurchase.filmid, fss_FilmPurchase.price, fss_Film.filmtitle, fss_Film.filmdescription FROM fss_FilmPurchase, fss_Film, fss_OnlinePayment WHERE fss_Film.filmid = fss_FilmPurchase.filmid AND fss_FilmPurchase.payid =( SELECT fss_OnlinePayment.payid WHERE fss_OnlinePayment.custid = '$custID')");
        if($statement->rowCount() == 0){
            echo"<br/>
                <br/>
            <h1 style='text-align: center'>You haven't purchased any films yet</h1>";
            exit;
        }
        echo "<table>";
        echo"<tr>
                <th>Film Title</th>
                <th>Film Description</th>
                <th>Price Paid</th>
                <th>Buy Again</th>
             </tr>";
        if ($statement->execute()) {

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                           <td>{$row['filmtitle']}</td></td>
                           <td>{$row['filmdescription']}</td></td>
                           <td>{$row['price']}</td>
                           <td><form method='post'>
                                <button class='table-btn' type='submit' name='AddToCart' id='AddToCart' value='{$row['filmid']}'>Buy Again</button><br/>
                           </form></td>

                       </tr>";
            }
        }
        echo "</table>";
    }

}