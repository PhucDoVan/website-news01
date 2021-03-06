<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language for organization screen
    |--------------------------------------------------------------------------
    */
    'message'    => [
        'create_success' => '登録しました。',
        'create_fail'    => '登録時にエラーが発生しました。',
        'update_success' => '更新しました。',
        'update_fail'    => '更新時にエラーが発生しました。',
        'merge_fail'     => '統合時にエラーが発生しました。',
        'merge_success'  => '統合しました。',
        'delete_success' => '削除しました。',
        'delete_fail'    => '削除時にエラーが発生しました。',
        'get_error'      => '該当するデータが存在しません。',
    ],
    'label'      => [
        'list'  => [
            'title'                       => '法人一覧',
            'title_filter'                => '絞り込み条件',
            'keyword_label'               => 'キーワード',
            'keyword_placeholder'         => '法人名',
            'search_label'                => '操作',
            'search_button'               => '絞り込む',
            'column_no'                   => 'No',
            'column_name'                 => '法人名',
            'column_address'              => '所在地',
            'column_contact'              => '連絡先',
            'column_update'               => '更新日',
            'button_create'               => '新規登録',
            'button_edit'                 => '編集',
            'button_merge'                => '重複確認',
            'button_delete'               => '削除',
            'table_empty_data'            => '該当するデータが存在しません。',
            'popup_delete_title'          => '削除確認',
            'popup_delete_confirm_delete' => '削除しますが',
        ],
        'merge' => [
            'title'               => '重複確認',
            'id_label'            => '法人ID',
            'name_label'          => '法人名表記',
            'kana_label'          => '法人名カナ',
            'postal_code_label'   => '郵便番号',
            'address_label'       => '住所',
            'tel_label'           => '電話番号',
            'email_label'         => 'メールアドレス',
            'fax_label'           => 'FAX',
            'keyword_label'       => '候補',
            'keyword_placeholder' => 'キーワード',
            'search_button'       => '探す',
            'merge_button'        => '統合する',
        ],
        'edit'  => [
            'require'                  => '（必須）',
            'title_create'             => '法人登録',
            'title_edit'               => '法人編集',
            'name_label'               => '法人名表記',
            'name_placeholder'         => '例）株式会社ACA',
            'kana_label'               => '法人名カナ',
            'kana_placeholder'         => '例）エーシーエー',
            'uid'                      => '法人識別ID',
            'uid_placeholder'          => 'XXX',
            'button_generate'          => '生成',
            'postal_label'             => '郵便番号',
            'postal_placeholder'       => '例）790-0062',
            'address_pref_label'       => '都道府県',
            'address_pref_placeholder' => '例）愛媛県',
            'address_city_label'       => '市区町村',
            'address_city_placeholder' => '例）松山市',
            'address_town_label'       => '町名番地',
            'address_town_placeholder' => '例）南江戸5-5-5',
            'address_etc_label'        => 'ビル・マンション名・号室',
            'address_etc_placeholder'  => '',
            'form_contact'             => '連絡先',
            'contact_name_label'       => '連絡先名',
            'tel_label'                => '電話番号',
            'tel_placeholder'          => '例）000-0000-0000',
            'email_label'              => 'メールアドレス',
            'email_placeholder'        => '例）example@example.com',
            'fax_label'                => 'FAX',
            'fax_placeholder'          => '例）000-0000-0000',
            'services'                 => [
                'title'                     => 'サービス契約状況',
                'name'                      => 'サービス名',
                'status'                    => 'ステータス',
                'action'                    => '操作',
                'button_re_active'          => '利用再開',
                'button_remove_restriction' => '制限解除',
                'button_stop'               => '強制停止',
                'button_terminate'          => '強制解約',
            ]
        ],
        'modal' => [
            'delete_title'                  => '削除確認',
            'delete_confirm'                => '削除しますが、よろしいですか？',
            'change_service_status_title'   => '変更の確認',
            'change_service_status_message' => 'ステータスを変更してもよろしいですか？',
            'terminate_service_title'       => '解約の確認',
            'terminate_service_message'     => '解約後、対象の法人は:service_nameを利用できなくなります。<br>強制解約を行いますか？',
        ],
        'form'  => [
            'SAVE'   => '保存する',
            'OK'     => 'OK',
            'CANCEL' => 'キャンセル',
        ]
    ],
    'attributes' => [
        'name' => '法人名表記',
    ],
];
