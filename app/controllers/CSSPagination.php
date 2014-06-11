<?php

/**
 * @author Dodit Suprianto
 * Email: d0dit@yahoo.com
 * Website: http://doditsuprianto.com, http://goiklan.co.nr
 * Website: http://www.meozit.com, http://easyads.co.nr
 *
 * CSSPagination is a pagination class which combines with Cascading Style Sheet for good looking style;
 * CSSPagination has main function to split all records before they will be loaded into one website,
 * to be several records in one page (you can determine how many records in one page).
 * So, if you want to jump at the other page, you can choose once of them.
 * CSSPagination is easy to use and good looking. I try to throw the complexity code.
 * The most important is, that you can change the CSS code to make it suitable with your own page style.
 */
class CSSPagination
{
    private $totalrows;
    private $rowsperpage;
    private $website;
    private $page;
    private $sql;
    private $ajax;

    public function __construct($sql, $rowsperpage, $website, $ajax = '')
    {
        $this->sql = $sql;
        $this->website = $website;
        $this->rowsperpage = $rowsperpage;
        $this->ajax = $ajax;
    }

    public function setPage($page)
    {
        if (!$page) {
            $this->page = 1;
        } else {
            $this->page = $page;
        }
    }

    public function getLimit()
    {
        return ($this->page - 1) * $this->rowsperpage;
    }

    private function getTotalRows()
    {
        //$result = @mysql_query($this->sql) or die ("query failed!");
        $this->totalrows = $this->sql; //mysql_num_rows($result);
    }

    private function getLastPage()
    {
        return ceil($this->totalrows / $this->rowsperpage);
    }

    public function showPage()
    {
        $this->getTotalRows($margin = false, $padding = false);

        $pagination = "";
        $lpm1 = $this->getLastPage() - 1;
        $page = $this->page;
        $prev = $this->page - 1;
        $next = $this->page + 1;

        //$pagination .= "<div class=\"pagination grid_12\"";
        $pagination .= "<ul class=\"pagination\"";
        if ($margin || $padding) {
            $pagination .= " style=\"";
            if ($margin)
                $pagination .= "margin: $margin;";
            if ($padding)
                $pagination .= "padding: $padding;";
            $pagination .= "\"";
        }
        $pagination .= ">";


        if ($this->getLastPage() > 1) {
            if ($page > 1)
                $pagination .= "<li class=\"arrow\"><a class=\"$this->ajax\" href=$this->website/$prev>&laquo;</a></li>";
            else
                //$pagination .= "<span class=\"disabled\">Â« prev</span>";
                $pagination .= "<li class=\"arrow unavailable\">&laquo;</li>";


            if ($this->getLastPage() < 9) {
                for ($counter = 1; $counter <= $this->getLastPage(); $counter++) {
                    if ($counter == $page)
                        //$pagination .= "<span class=\"current\">".$counter."</span>";
                        $pagination .= "<li class=\"current\"><a href=''>" . $counter . "</a></li>";
                    else
                        $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/$counter>" . $counter . "</a></li>";
                }
            } elseif ($this->getLastPage() >= 9) {
                if ($page < 4) {
                    for ($counter = 1; $counter < 6; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li class=\"current\"><a href=''>" . $counter . "</a></li>";
                        else
                            $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/$counter/>" . $counter . "</a></li>";
                    }
                    $pagination .= "&hellip;";
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/$lpm1>" . $lpm1 . "</a></li>";
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/" . $this->getLastPage() . ">" . $this->getLastPage() . "</a></li>";
                } elseif ($this->getLastPage() - 3 > $page && $page > 1) {
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/1>1</a></li>";
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/2>2</a></li>";
                    $pagination .= "&hellip;";
                    for ($counter = $page - 1; $counter <= $page + 1; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li class=\"current\"><a href=''>" . $counter . "</a></li>";
                        else
                            $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/$counter>" . $counter . "</a></li>";
                    }
                    $pagination .= "&hellip;";
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/$lpm1>$lpm1</a></li>";
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/" . $this->getLastPage() . ">" . $this->getLastPage() . "</a></li>";
                } else {
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/1>1</a></li>";
                    $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/2>2</a></li>";
                    $pagination .= "&hellip;";
                    for ($counter = $this->getLastPage() - 4; $counter <= $this->getLastPage(); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li class=\"current\"><a hef=''>" . $counter . "</a></li>";
                        else
                            $pagination .= "<li><a class=\"$this->ajax\" href=$this->website/$counter>" . $counter . "</a></li>";
                    }
                }
            }

            if ($page < $counter - 1)
                $pagination .= "<li class=\"arrow\"><a  class=\"$this->ajax\" href=$this->website/$next>&raquo;</a></li>";
            else
                $pagination .= "<li class=\"arrow unavailable\">&raquo;</li>";
            $pagination .= "</ul>\n";
        }

        return $pagination;
    }
}
 