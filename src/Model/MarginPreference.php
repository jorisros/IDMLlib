<?php


namespace JorisRos\IDMLlib\Model;


class MarginPreference
{
    /** @var string */
    private $columnCount;

    /** @var string */
    private $columnGutter;

    /** @var string */
    private $top;

    /** @var string */
    private $bottom;

    /** @var string */
    private $left;

    /** @var string */
    private $right;

    /** @var string */
    private $columnDirection;

    /** @var string */
    private $columnsPositions;

    /**
     * @return string
     */
    public function getColumnCount()
    {
        return $this->columnCount;
    }

    /**
     * @param string $columnCount
     */
    public function setColumnCount($columnCount)
    {
        $this->columnCount = $columnCount;
    }

    /**
     * @return string
     */
    public function getColumnGutter()
    {
        return $this->columnGutter;
    }

    /**
     * @param string $columnGutter
     */
    public function setColumnGutter($columnGutter)
    {
        $this->columnGutter = $columnGutter;
    }

    /**
     * @return string
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param string $top
     */
    public function setTop($top)
    {
        $this->top = $top;
    }

    /**
     * @return string
     */
    public function getBottom()
    {
        return $this->bottom;
    }

    /**
     * @param string $bottom
     */
    public function setBottom($bottom)
    {
        $this->bottom = $bottom;
    }

    /**
     * @return string
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param string $left
     */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
     * @return string
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param string $right
     */
    public function setRight($right)
    {
        $this->right = $right;
    }

    /**
     * @return string
     */
    public function getColumnDirection()
    {
        return $this->columnDirection;
    }

    /**
     * @param string $columnDirection
     */
    public function setColumnDirection($columnDirection)
    {
        $this->columnDirection = $columnDirection;
    }

    /**
     * @return string
     */
    public function getColumnsPositions()
    {
        return $this->columnsPositions;
    }

    /**
     * @param string $columnsPositions
     */
    public function setColumnsPositions($columnsPositions)
    {
        $this->columnsPositions = $columnsPositions;
    }
}