<?
    function findDvd($title)
    {
        $title = dbQuore($title)
        $query =    "   
                    SELECT * FROM dvd
                    WHERE title LIKE '%{$title}%'
                    ";
        return dbExecude($query);
    }