<?php

class Question
{
    private string $mail;
    private string $text;

    public function __construct(string $mail,string $text)
    {
        $this->mail = $mail;
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return bool
     */
    public function checkMailFormat(): bool
    {
        if (!filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}
