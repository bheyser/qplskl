<?php

/**
 * Concrete end token class.
 *
 * @warning This class accepts attributes even though end tags cannot. This
 * is for optimization reasons, as under normal circumstances, the Lexers
 * do not pass attributes.
 */
class HTMLPurifier_Token_End extends HTMLPurifier_Token_Tag
{
    /**
     * Token that started this node. Added by MakeWellFormed. Please
     * do not edit this!
     */
    public $start;
}

// vim: et sw=4 sts=4
