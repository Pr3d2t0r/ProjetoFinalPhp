<?php


class Paginator{
    private bool $valid;
    private array $dbItens;
    public array $pages;
    public int $limit;
    public int $numPages;
    private int $pageNum;
    private stdClass $obj;

    public function __construct(array $dbItens, int $limit=3, $page = 0){
        $this->dbItens = $dbItens;
        $this->limit = $limit;
        $this->obj = new stdClass();
        $this->valid = false;
        $this->pageNum = $page;
    }

    public function prepare(){
        $this->pages = chunkArray($this->dbItens, $this->limit);
        $this->numPages = count($this->pages);
        if ($this->numPages > 1)
            $this->valid = true;
        else
            $this->valid = false;
        if (isset($this->pages[$this->pageNum])) {
            $this->obj->itens = $this->pages[$this->pageNum];
            $this->obj->hasNextPage = isset($this->pages[$this->pageNum + 1]);
            $this->obj->hasNextPreviousPage = isset($this->pages[$this->pageNum - 1]);
            $this->obj->show = $this->valid;
            $this->obj->pageNum = $this->pageNum;
            return $this;
        }
        $this->obj->error = true;
        $this->obj->firstPage = isset($this->pages[1])?1:null;
        $this->obj->itens = $this->pages[1] ?? [];
        $this->obj->hasNextPage = isset($this->pages[2]);
        $this->obj->show = $this->valid;
        $this->obj->hasNextPreviousPage = false;
        $this->obj->pageNum = 1;

        return $this;
    }
    public function use(){
        return $this->obj;
    }
}