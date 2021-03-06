<?php
declare(strict_types=1);

namespace Emnlmn\Phiode;

use Closure;

if (!function_exists('pipe')) {
    /**
     * @template A
     * @template B
     * @template C
     * @template D
     * @template E
     * @template F
     * @template G
     * @template C1 as callable(A): B
     * @template C2 as null|callable(B): C
     * @template C3 as null|callable(C): D
     * @template C4 as null|callable(D): E
     * @template C5 as null|callable(E): F
     * @template C6 as null|callable(F): G
     * @psalm-param A $value
     * @param C1 $c1
     * @param C2 $c2
     * @param C3 $c3
     * @param C4 $c4
     * @param C5 $c5
     * @param C6 $c6
     *
     * @psalm-return (
     *     C2 is null
     *       ? B
     *       : C3 is null
     *         ? C
     *         : C4 is null
     *           ? D
     *           : C5 is null
     *             ? E
     *             : C6 is null ? F : G
     * )
     * @return mixed
     */
    function pipe(
        $value,
        callable $c1,
        ?callable $c2 = null,
        ?callable $c3 = null,
        ?callable $c4 = null,
        ?callable $c5 = null,
        ?callable $c6 = null
    ) {
        switch (func_num_args()) {
            case 7:
                if (null !== $c2
                    && null !== $c3 && null !== $c4 && null !== $c5 && $c6 !== null) return $c6($c5($c4($c3($c2($c1($value))))));
            case 6:
                if (null !== $c2
                    && null !== $c3 && null !== $c4 && null !== $c5) return $c5($c4($c3($c2($c1($value)))));
            case 5:
                if (null !== $c2
                    && null !== $c3 && null !== $c4) return $c4($c3($c2($c1($value))));
            case 4:
                if (null !== $c2 && null !== $c3) return $c3($c2($c1($value)));
            case 3:
                if (null !== $c2) return $c2($c1($value));
            default:
                return $c1($value);
        }
    }
}




