<?php

return [
    'accepted'   => ':attribute必须接受',
    'active_url' => ':attribute 不是一个有效的链接',
    'after'      => ':attribute必须是一个在 :date之后的日期',
    'alpha'      => ':attribute只能由字母组成',
    'alpha_dash' => ':attribute只能由字母／数字／下划线组成',
    'alpha_num'  => ':attribute只能由字母和数字组成',
    'before'     => ':attribute必须是一个在 :date之前的日期',
    'between' => [
        'file'    => ':attribute必须介于:min-:max千字节之间',
        'string'  => ':attribute必须介于:min-:max个字符之间',
        'numeric' => ':attribute必须介于:min-:max之间',
    ],
    'min' => [
        'file'    => ':attribute必须大于:min千字节',
        'string'  => ':attribute必须大于:min个字符',
        'numeric' => ':attribute必须大于:min',
    ],
    'size' => [
        'file'    => ':attribute大小必须是:size千字节',
        'numeric' => ':attribute大小必须是:size',
        'string'  => ':attribute必须是:size个字符',
    ],
    'max' => [
        'numeric' => ':attribute必须小于:max',
        'file'    => ':attribute必须小于:max千字节',
        'string'  => ':attribute必须小于:max个字符',
    ],
    'confirmed'        => ':attribute确认不匹配',
    'date'             => ':attribute不是一个有效的日期',
    'date_format'      => ':attribute不匹配日期格式 :format',
    'different'        => ':attribute和:other不能相同',
    'digits'           => ':attribute必须是:digits位的数字',
    'digits_between'   => ':attribute必须是介于:min和:max位的数字',
    'email'            => ':attribute地址格式不正确',
    'exists'           => ':attribute不被支持',
    'image'            => ':attribute必须是一张图片',
    'in'               => ':attribute不符合',
    'integer'          => ':attribute必须是一个整数',
    'ip'               => ':attribute必须是一个有效的IP地址',
    'mimes'            => ':attribute必须是一个 :values类型的文件',
    'not_in'           => ':attribute不符合规则',
    'numeric'          => ':attribute必须是一个数字',
    'regex'            => ':attribute不匹配',
    'required'         => ':attribute不能为空',
    'required_if'      => ':attribute在:other为:value时为必填项',
    'required_with'    => ':attribute在:values存在时为必填项',
    'required_without' => ':attribute在:values不存在时为必填项',
    'same'             => ':attribute和:other必须匹配',
    'unique'           => ':attribute已经有人使用',
    'url'              => ':attribute格式不正确',

    'custom' => [

    ],
    'attributes' => [
        'username' => '用户名',
        'password' => '密码',
        'email'    => '邮箱',
    ],
];
