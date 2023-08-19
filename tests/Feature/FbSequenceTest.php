<?php

namespace Tests\Feature;

use Tests\TestCase;

class FbSequenceTest extends TestCase {
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fbSeq() {
        $this->assertEquals(13, $this->x(7));
    }

    protected function x($n): int {
        if ($n == 0) {
            return 0;
        } else if ($n == 1) {
            return 1;
        } else {
            return $this->x($n - 1) + $this->x($n - 2);
        }
    }
}
