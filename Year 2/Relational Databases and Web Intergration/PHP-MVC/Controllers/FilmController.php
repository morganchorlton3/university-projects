<?php
/**
 * Created by PhpStorm.
 * User: morga
 * Date: 24/04/2019
 * Time: 23:25
 */

include_once 'Controller.php';
include_once './Models/Session.php';



class FilmController extends Controller
{
    public static function displayFilms(){

        $statement  = self::statementQuery("SELECT filmrating, fss_Film.filmid, filmtitle, filmdescription FROM fss_Film, fss_Rating WHERE fss_Rating.ratid = fss_Film.ratid");
        echo "<table>";
        echo"<tr>
                <th>Film Title</th>
                <th>Film Description</th>
                <th>Film Rating</th>
                <th>Buy Film</th>
             </tr>";
        if ($statement->execute()) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                           <td>{$row['filmtitle']}</td></td>
                           <td>{$row['filmdescription']}</td></td>
                           <td>{$row['filmrating']}</td>
                           <td><form method='post'>
                                <button class='table-btn' type='submit' name='AddToCart' id='filmID' value='{$row['filmid']}'>Add to Cart</button><br/>
                           </form></td>
                       </tr>";
            }
        }
        echo "</table>";
    }
}