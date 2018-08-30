<?php

namespace Deiucanta\Smart\Tests\Models;

use Deiucanta\Smart\Field;
use Deiucanta\Smart\Model;

class OhRule extends Model
{
    public function fields()
    {
        return [
            Field::make('accepted_field')->accepted(),
            Field::make('activeUrl_field')->activeUrl(),
            Field::make('after_field')->after('2018-12-31'),
            Field::make('afterOrEqual_field')->afterOrEqual('2018-12-31'),
            Field::make('alpha_field')->alpha(),
            Field::make('alphaDash_field')->alphaDash(),
            Field::make('alphaNum_field')->alphaNum(),
            Field::make('array_field')->array(),
            Field::make('bail_field')->bail(),
            Field::make('before_field')->before('2018-12-31'),
            Field::make('beforeOrEqual_field')->beforeOrEqual('2018-12-31'),
            Field::make('between_field')->between(1, 20),
            Field::make('confirmed_field')->confirmed(),
            Field::make('dateEquals_field')->dateEquals('2018-12-31'),
            Field::make('dateFormat_field')->dateFormat('Y-m-d'),
            Field::make('different_field')->different('somefield'),
            Field::make('digits_field')->digits(3),
            Field::make('digitsBetween_field')->digitsBetween(5, 9),
            Field::make('exists_field')->exists('users'),
            Field::make('exists_field_with_column')->exists('users', 'username'),
            Field::make('exists_field_full')->exists('users', 'username', function ($query) {
                $query->where('account_id', 1);
            }),
            Field::make('filled_field')->filled(),
            Field::make('gt_field')->gt(5),
            Field::make('gte_field')->gte(6),
            Field::make('in_field')->in(['D', 'E', 'F']),
            Field::make('inArray_field')->inArray('letters'),
            Field::make('ip_field')->ip(),
            Field::make('ipv4_field')->ipv4(),
            Field::make('ipv6_field')->ipv6(),
            Field::make('lt_field')->lt(10),
            Field::make('lte_field')->lte(11),
            Field::make('max_field')->max(12),
            Field::make('min_field')->min(13),
            Field::make('notIn_field')->notIn(['Mary', 'May']),
            Field::make('notRegex_field')->notRegex('/w+/'),
            Field::make('numeric_field')->numeric(),
            Field::make('present_field')->present(),
            Field::make('regex_field')->regex('/{abc}/'),
            Field::make('required_field')->required(),
            Field::make('requiredIf_field')->requiredIf('status', 'ACTIVE'),
            Field::make('requiredUnless_field')->requiredUnless('status', 'ARCHIVED'),
            Field::make('requiredWith_field')->requiredWith(['a', 'b', 'c', 'd']),
            Field::make('requiredWithAll_field')->requiredWithAll(['e', 'f', 'g', 'h']),
            Field::make('requiredWithout_field')->requiredWithout(['w', 'x', 'y', 'z']),
            Field::make('requiredWithoutAll_field')->requiredWithoutAll(['l', 'm', 'n', 'o']),
            Field::make('same_field')->same('password_confirm'),
            Field::make('timezone_field')->timezone()
        ];
    }
}
