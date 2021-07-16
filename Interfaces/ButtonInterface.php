<?php

namespace Interfaces\ButtonInterface;

interface ButtonInterface
{
    public function __construct(string $href = "", string $linkName = "", bool $targetBlank = false);
    public function setName(string $linkName): self;
    public function setCssClasses($cssClass): self;
    public function setUrl(string $href): self;
    public function setTarget(bool $isBlank): self;
    public function getCssClasses(): ?string;
    public function __toString(): string;
}