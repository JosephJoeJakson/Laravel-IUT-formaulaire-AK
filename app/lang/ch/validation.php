<?php

<?php 

return [

    'accepted' => '字段 :attribute 必须被接受。',
    'accepted_if' => '当 :other 是 :value 时，字段 :attribute 必须被接受。',
    'active_url' => '字段 :attribute 必须是有效的URL。',
    'after' => '字段 :attribute 必须是日期在 :date 之后。',
    'after_or_equal' => '字段 :attribute 必须是日期在 :date 之后或相等。',
    'alpha' => '字段 :attribute 只能包含字母。',
    'alpha_dash' => '字段 :attribute 只能包含字母、数字、破折号和下划线。',
    'alpha_num' => '字段 :attribute 只能包含字母和数字。',
    'array' => '字段 :attribute 必须是数组。',
    'ascii' => '字段 :attribute 只能包含单字节的字母数字字符和符号。',
    'before' => '字段 :attribute 必须是日期在 :date 之前。',
    'before_or_equal' => '字段 :attribute 必须是日期在 :date 之前或相等。',
    'between' => [
        'array' => '字段 :attribute 必须包含 :min 到 :max 个项目。',
        'file' => '字段 :attribute 必须在 :min 到 :max 千字节之间。',
        'numeric' => '字段 :attribute 必须在 :min 到 :max 之间。',
        'string' => '字段 :attribute 必须在 :min 到 :max 个字符之间。',
    ],
    'boolean' => '字段 :attribute 必须是 true 或 false。',
    'can' => '字段 :attribute 包含未授权的值。',
    'confirmed' => '字段 :attribute 确认不匹配。',
    'current_password' => '密码不正确。',
    'date' => '字段 :attribute 必须是有效的日期。',
    'date_equals' => '字段 :attribute 必须是日期等于 :date。',
    'date_format' => '字段 :attribute 必须匹配格式 :format。',
    'decimal' => '字段 :attribute 必须有 :decimal 位小数。',
    'declined' => '字段 :attribute 必须被拒绝。',
    'declined_if' => '当 :other 是 :value 时，字段 :attribute 必须被拒绝。',
    'different' => '字段 :attribute 和 :other 必须不同。',
    'digits' => '字段 :attribute 必须有 :digits 位数字。',
    'digits_between' => '字段 :attribute 必须在 :min 到 :max 位数字之间。',
    'dimensions' => '字段 :attribute 具有无效的图像尺寸。',
    'distinct' => '字段 :attribute 具有重复的值。',
    'doesnt_end_with' => '字段 :attribute 不得以以下任何一项结尾: :values。',
    'doesnt_start_with' => '字段 :attribute 不得以以下任何一项开头: :values。',
    'email' => '字段 :attribute 必须是有效的电子邮件地址。',
    'ends_with' => '字段 :attribute 必须以以下之一结尾: :values。',
    'enum' => '选择的 :attribute 无效。',
    'exists' => '选择的 :attribute 无效。',
    'file' => '字段 :attribute 必须是文件。',
    'filled' => '字段 :attribute 必须有一个值。',
    'gt' => [
        'array' => '字段 :attribute 必须有多于 :value 个项目。',
        'file' => '字段 :attribute 必须大于 :value 千字节。',
        'numeric' => '字段 :attribute 必须大于 :value。',
        'string' => '字段 :attribute 必须多于 :value 个字符。',
    ],
    'gte' => [
        'array' => '字段 :attribute 必须有 :value 个项目或更多。',
        'file' => '字段 :attribute 必须大于或等于 :value 千字节。',
        'numeric' => '字段 :attribute 必须大于或等于 :value。',
        'string' => '字段 :attribute 必须多于或等于 :value 个字符。',
    ],
    'image' => '字段 :attribute 必须是图像。',
    'in' => '选择的 :attribute 无效。',
    'in_array' => '字段 :attribute 必须存在于 :other 中。',
    'integer' => '字段 :attribute 必须是整数。',
    'ip' => '字段 :attribute 必须是有效的IP地址。',
    'ipv4' => '字段 :attribute 必须是有效的IPv4地址。',
    'ipv6' => '字段 :attribute 必须是有效的IPv6地址。',
    'json' => '字段 :attribute 必须是有效的JSON字符串。',
    'lowercase' => '字段 :attribute 必须是小写。',
    'lt' => [
        'array' => '字段 :attribute 必须少于 :value 个项目。',
        'file' => '字段 :attribute 必须小于 :value 千字节。',
        'numeric' => '字段 :attribute 必须少于 :value。',
        'string' => '字段 :attribute 必须少于 :value 个字符。',
    ],
    'lte' => [
        'array' => '字段 :attribute 不得超过 :value 个项目。',
        'file' => '字段 :attribute 必须小于或等于 :value 千字节。',
        'numeric' => '字段 :attribute 必须小于或等于 :value。',
        'string' => '字段 :attribute 必须少于或等于 :value 个字符。',
    ],
    'mac_address' => '字段 :attribute 必须是有效的MAC地址。',
    'max' => [
        'array' => '字段 :attribute 不得超过 :max 个项目。',
        'file' => '字段 :attribute 不得大于 :max 千字节。',
        'numeric' => '字段 :attribute 不得大于 :max。',
        'string' => '字段 :attribute 不得大于 :max 个字符。',
    ],
    'max_digits' => '字段 :attribute 不得超过 :max 位数字。',
    'mimes' => '字段 :attribute 必须是以下类型的文件: :values。',
    'mimetypes' => '字段 :attribute 必须是以下类型的文件: :values。',
    'min' => [
        'array' => '字段 :attribute 必须至少有 :min 个项目。',
        'file' => '字段 :attribute 必须至少为 :min 千字节。',
        'numeric' => '字段 :attribute 必须至少为 :min。',
        'string' => '字段 :attribute 必须至少为 :min 个字符。',
    ],
    'min_digits' => '字段 :attribute 必须至少有 :min 位数字。',
    'missing' => '字段 :attribute 必须丢失。',
    'missing_if' => '当 :other 是 :value 时，字段 :attribute 必须丢失。',
    'missing_unless' => '除非 :other 是 :value，字段 :attribute 必须丢失。',
    'missing_with' => '当 :values 存在时，字段 :attribute 必须丢失。',
    'missing_with_all' => '当 :values 存在时，字段 :attribute 必须丢失。',
    'multiple_of' => '字段 :attribute 必须是 :value 的倍数。',
    'not_in' => '选择的 :attribute 无效。',
    'not_regex' => '字段 :attribute 的格式无效。',
    'numeric' => '字段 :attribute 必须是数字。',
    'password' => [
        'letters' => '字段 :attribute 必须包含至少一个字母。',
        'mixed' => '字段 :attribute 必须包含至少一个大写字母和一个小写字母。',
        'numbers' => '字段 :attribute 必须包含至少一个数字。',
        'symbols' => '字段 :attribute 必须包含至少一个符号。',
        'uncompromised' => ':attribute 已出现在数据泄露中，请选择不同的 :attribute。',
    ],
    'present' => '字段 :attribute 必须存在。',
    'prohibited' => '字段 :attribute 被禁止。',
    'prohibited_if' => '当 :other 是 :value 时，字段 :attribute 被禁止。',
    'prohibited_unless' => '除非 :other 在 :values 中，字段 :attribute 被禁止。',
    'prohibits' => '字段 :attribute 禁止 :other 存在。',
    'regex' => '字段 :attribute 的格式无效。',
    'required' => '字段 :attribute 是必需的。',
    'required_array_keys' => '字段 :attribute 必须包含以下键: :values。',
    'required_if' => '当 :other 是 :value 时，字段 :attribute 是必需的。',
    'required_if_accepted' => '当 :other 被接受时，字段 :attribute 是必需的。',
    'required_unless' => '除非 :other 在 :values 中，字段 :attribute 是必需的。',
    'required_with' => '当 :values 存在时，字段 :attribute 是必需的。',
    'required_with_all' => '当 :values 存在时，字段 :attribute 是必需的。',
    'required_without' => '当 :values 不存在时，字段 :attribute 是必需的。',
    'required_without_all' => '当 :values 都不存在时，字段 :attribute 是必需的。',
    'same' => '字段 :attribute 必须与 :other 匹配。',
    'size' => [
        'array' => '字段 :attribute 必须包含 :size 个项目。',
        'file' => '字段 :attribute 必须为 :size 千字节。',
        'numeric' => '字段 :attribute 必须为 :size。',
        'string' => '字段 :attribute 必须为 :size 个字符。',
    ],
    'starts_with' => '字段 :attribute 必须以以下之一开头: :values。',
    'string' => '字段 :attribute 必须是字符串。',
    'timezone' => '字段 :attribute 必须是有效的时区。',
    'unique' => ':attribute 已被占用。',
    'uploaded' => ':attribute 上传失败。',
    'uppercase' => '字段 :attribute 必须是大写。',
    'url' => '字段 :attribute 必须是有效的URL。',
    'ulid' => '字段 :attribute 必须是有效的ULID。',
    'uuid' => '字段 :attribute 必须是有效的UUID。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | 在这里，您可以指定属性的自定义验证消息，使用 "attribute.rule" 来命名行。这有助于快速指定特定于属性的自定义语言消息以用于给定的属性规则。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '自定义消息',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | 下面的语言行用于更改我们的属性占位符，如 "电子邮件地址" 而不是 "email"。这只是帮助我们使消息更有表现力的方式。
    |
    */

    'attributes' => [],

];
