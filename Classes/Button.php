<?php

namespace Classes\Button;

require_once './Interfaces/ButtonInterface.php';

use http\Exception\RuntimeException;
use Interfaces\ButtonInterface\ButtonInterface;

use JetBrains\PhpStorm\Pure;

class Button implements ButtonInterface
{
    protected string             $href;
    protected string             $linkName;
    protected null|string|array  $cssClasses;
    protected bool               $linkTarget    = false;
    protected array              $attributes;

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


    #[Pure] public function getAttributes(): string
    {

        $attributes = "";

        if (empty($this->attributes)) {
            return "";
        }

        if (is_array($this->attributes)) {

            $combine    = "";
            $mergeClass = substr($this->getCssClasses(), 0,5);
            foreach ((array)$this->attributes as $key => $value) {

                if ($key === $mergeClass) {
                    $combine = ' '.substr($this->getCssClasses(), 7,-1);
                }

                $attributes .= ($key === 'target' && $this->linkTarget ?  "": "$key='".$value. $combine."'");
            }

        }

        return $attributes;

    }


    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;
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
            return '<a '. $this->getAttributes() .' 
                        target="'. ($this->linkTarget ? '_blank' :'_self') .'" 
                        '. $this->getCssClasses() .' 
                        href="'.$this->href.'">
                            '.$this->linkName .'
                    </a>';
        }

        return $this->linkName;
    }
}
