<?php
include('config.php');

class Request
{
    public function get_album($bdd)
    {
        if (isset($_GET['albums'])&& empty($_GET['albums'])) {
            $reponse = $bdd->prepare('SELECT * FROM albums');
            if ($reponse->execute()) {
                $this->albums = $reponse->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($this->albums);
            }
        }
    }

    public function get_tracks($bdd)
    {
        if (!empty($_GET['albums'])) {
            $num_album=$_GET['albums'];
            $reponse = $bdd->prepare("SELECT * FROM tracks WHERE album_id='$num_album'");
            if ($reponse->execute()) {
                $this->albums = $reponse->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($this->albums);
            }
        }
    }

    public function get_artists($bdd)
    {
        if (isset($_GET["artists"])) {
            $data = $bdd -> prepare("SELECT * FROM artists");
            $data -> execute();

            $array = $data -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($array);
        }
    }

    public function get_description($bdd)
    {
        if (isset($_GET["description"])) {
            $request = $_GET['description'];
            $data = $bdd -> prepare("SELECT * FROM artists WHERE id LIKE '$request'");
            $data -> execute();
            $array = $data -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($array);
        }
    }

    public function get_biography($bdd)
    {
        if (isset($_GET["biography"])) {
            $request = $_GET['biography'];
            $data = $bdd -> prepare("SELECT bio FROM artists WHERE id LIKE '$request'");
            $data -> execute();
            $array = $data -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($array);
        }
    }
    public function get_albums_by_artist($bdd)
    {
        if (isset($_GET["albums_by_artist"])) {
            $request = $_GET['albums_by_artist'];
            $data = $bdd -> prepare("SELECT albums.name FROM albums INNER JOIN artists WHERE albums.artist_id = artists.id AND artists.id LIKE '$request'");
            $data -> execute();
            $array = $data -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($array);
        }
    }
    public function get_photo($bdd)
    {
        if (isset($_GET["photo"])) {
            $request = $_GET['photo'];
            $data = $bdd -> prepare("SELECT photo FROM artists WHERE id LIKE '$request'");
            $data -> execute();
            $array = $data -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($array);
        }
    }
    public function get_TitleSong($bdd)//lister détail tracks
    {
        if (isset($_GET["TitleSong"])) {
            $titlesong = $_GET["TitleSong"];
            $sql = $bdd->prepare("SELECT name, duration, mp3 FROM tracks WHERE name LIKE '%$titlesong%'");
            $sql->execute();
            $result_song = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result_song);
        }
    }

    public function get_AllGenre($bdd)//lister tous les genres
    {
        if (isset($_GET['genre'])&& empty($_GET['genre'])) {
            $sql = $bdd->prepare("SELECT * FROM genres");
            $sql->execute();
            $result_genre = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result_genre);
        }
    }

    public function get_GenreName($bdd)//lister détail genre et ses albums
    {
        if (isset($_GET['genre'])&& !empty($_GET["genre"])) {
            $genreid = $_GET["genre"];
            $query = "SELECT genres.id AS 'ID', genres.name, albums.id, albums.name AS 'ALBUM', albums.cover_small FROM genres
            JOIN genres_albums ON genres.id = genres_albums.genre_id
            JOIN albums ON genres_albums.album_id = albums.id
            WHERE genres.id LIKE '%$genreid%'";
            $sql = $bdd->prepare($query);
            $sql->execute();
            $result_genre = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result_genre);
        }
    }

    public function hasard($bdd)
    {
        if (isset($_GET["hasard"])&& empty($_GET['hasard'])) {
            $sql = $bdd->prepare("SELECT name, cover_small FROM albums ORDER BY RAND() LIMIT 5");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
    }
}


$p = new Request;
$p->get_album($bdd);
$p->get_tracks($bdd);
$p->get_artists($bdd);
$p->get_description($bdd);
$p->get_biography($bdd);
$p->get_albums_by_artist($bdd);
$p->get_photo($bdd);
$p->get_TitleSong($bdd);
$p->get_AllGenre($bdd);
$p->get_GenreName($bdd);
$p->hasard($bdd);
