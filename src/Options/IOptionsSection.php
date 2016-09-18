<?php

namespace SeStep\SettingsInterface\Options;




interface IOptionsSection extends IOptionsContainer
{
    /**
     * @return string
     */
    public function getDomain();
}
