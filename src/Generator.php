<?php

namespace Deiucanta\Smart;

class Generator
{
    protected function joinTree($lines, $level = 0, $indent = 4)
    {
        $output = '';

        foreach ($lines as $item) {
            if (is_array($item)) {
                $output .= $this->joinTree($item, $level + 1);
            } else {
                $output .= str_repeat(' ', $level * $indent) . $item . "\n";
            }
        }

        return $output;
    }

    protected function joinSections($sections)
    {
        $output = [];

        // filter out empty sections
        $sections = array_values(array_filter($sections, function ($section) {
            return $section !== null && count($section) > 0;
        }));

        for ($i = 0; $i < count($sections); $i++) {
            $output = array_merge($output, $sections[$i]);
            if ($i < count($sections) - 1) $output[] = "";
        }

        return $output;
    }
}
