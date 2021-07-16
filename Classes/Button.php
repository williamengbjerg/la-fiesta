<?php

namespace Classes\Button;

require_once './Interfaces/ButtonInterface.php';
use Interfaces\ButtonInterface\ButtonInterface;

use JetBrains\PhpStorm\Pure;

class Button implements ButtonInterface
{
    protected string $href;
    protected string $linkName;
    protected null|string|array $cssClasses;
    protected bool $linkTarget = false;

    public function __construct(string $href = "", string $linkName = "", bool $targetBlank = false)
    {
        $this->href         = $href;
        $this->linkName     = $linkName;
        $this->linkTarget   = $targetBlank;
    }

    /**
     * Retrieve Css classes
     *
     * @return string|null
     */
    public function getCssClasses(): ?string
    {
        if (empty($this->cssClasses)) {
            return "";
        }

        if (is_array($this->cssClasses)) {
            $multipleCss = implode(" ", $this->cssClasses);
        }

        return 'class="'. (is_array($this->cssClasses) ? ($multipleCss ?? "") : $this->cssClasses) .'"';

    }

    /**
     * Url target (Blank|self)
     *
     * @param bool $isBlank
     * @return $this
     */
    public function setTarget(bool $isBlank): self
    {
        $this->linkTarget = $isBlank;

        return $this;

    }

    /**
     * Url
     *
     * @param string $href
     * @return $this
     */
    public function setUrl(string $href): self
    {
        $this->href = $href;

        return $this;
    }

    /** Url Name
     *
     * @param string $linkName
     * @return $this
     */
    public function setName(string $linkName): self
    {
        $this->linkName = $linkName;

        return $this;
    }

    /**
     * Css classes
     *
     * @param $cssClass
     * @return $this
     */
    public function setCssClasses($cssClass): self
    {
        $this->cssClasses = $cssClass;

        return $this;
    }

    /**
     * Output link setup
     *
     * @return string
     */
    #[Pure] public function __toString(): string
    {
        // With url
        if (!empty($this->href)) {
            return '<a target="'. ($this->linkTarget ? '_blank' :'_self') .'" '. $this->getCssClasses() .' href="'.$this->href.'">'.$this->linkName .'</a>';
        }

        return $this->linkName;
    }
}
