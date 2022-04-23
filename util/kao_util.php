<?php

enum KaoUtil {
    case POSITIVE; case NEGATIVE;
    // sauce: http://kaomoji.ru/en/

    public function getRandomKaomoji() {
        return match($this) {
            KaoType::POSITIVE => array_rand(['(o^▽^o)', '＼(￣▽￣)／', '(⁀ᗢ⁀)', 'o(≧▽≦)o', 'o(>ω<)o', '(≧◡≦)', '(๑˃ᴗ˂)ﻭ']),
            KaoType::NEGATIVE => array_rand(['(╥﹏╥)', '(ﾉω･､)', '(＿ ＿*) Z z z', '(￣ ￣|||)', '( ; ω ; )', '( ╥ω╥ )']),
        };
    }
}


?>