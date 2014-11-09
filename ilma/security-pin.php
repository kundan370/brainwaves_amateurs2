

<?php

function keygen_s2k($hash, $password, $salt, $bytes)
{
    $result = false;

    if (extension_loaded('hash') === true)
    {
        $times = $bytes / ($block = strlen(hash($hash, null, true)));

        if ($bytes % $block != 0)
        {
            ++$times;
        }

        for ($i = 0; $i < $times; ++$i)
        {
            $result .= hash($hash, str_repeat("\0", $i) . $salt . $password, true);
        }
    }

    echo $result;
}
?>
keygen_s2k('rupal','12345',12,6);
