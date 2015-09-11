<?php

$config =
    array(
    'cadastro_entidade_form'=> array(
                    'nome'              => array('field' => 'nome',             'label' => 'Instituição',    'rules'  => 'trim|required|ucfirst'),
                    'email'             => array('field' => 'email',            'label' => 'E-mail',         'rules'  => 'trim|required|valid_email|max_length[100]|is_unique[entidade.email]'),
                    'endereco'          => array('field' => 'endereco',         'label' => 'Endereço',       'rules'  => 'trim|required'),
                    'bairro'            => array('field' => 'bairro',           'label' => 'Bairro',         'rules'  => 'trim|required'),
                    'cidade'            => array('field' => 'cidade',           'label' => 'Cidade',         'rules'  => 'trim|required'),
                    'telefone'          => array('field' => 'telefone',         'label' => 'Telefone',       'rules'  => 'trim|required'),
                    'estado'            => array('field' => 'estado',           'label' => 'Estado',         'rules'  => 'trim|required'),
                    'cep'               => array('field' => 'cep',              'label' => 'CEP',            'rules'  => 'trim|required'),
                    'autoriza_endereco'   => array('field' => 'autoriza_endereco',  'label' => 'Autoriza Endereço',  'rules'  => 'trim|required'),
                    'autoriza_foto'     => array('field' => 'autoriza_foto',    'label' => 'Autoriza Fotos', 'rules'  => 'trim|required'),
                    'descricao'         => array('field' => 'descricao',        'label' => 'Objetivos',      'rules'  => 'trim|required'),
                    'site'              => array('field' => 'site',             'label' => 'site',           'rules'  => ''),
                    'video'              => array('field' => 'video',           'label' => 'video',          'rules'  => ''),
                    'senha'             => array('field' => 'senha',            'label' => 'Senha',          'rules'  => 'required|min_length[6]|max_length[20]'),                   
                    'confirma_senha'    => array('field' => 'confirma_senha',   'label' => 'Confirmar senha', 'rules'  => 'required|matches[senha]|md5')
                               
        ),
        'altera_entidade_form'=> array(
                    'nome'              => array('field' => 'nome',             'label' => 'Instituição',   'rules'  => 'trim|required|ucfirst'),
                    'endereco'          => array('field' => 'endereco',         'label' => 'Endereço',       'rules'  => 'trim|required'),
                    'bairro'            => array('field' => 'bairro',           'label' => 'Bairro',         'rules'  => 'trim|required'),
                    'cidade'            => array('field' => 'cidade',           'label' => 'Cidade',         'rules'  => 'trim|required'),
                    'telefone'          => array('field' => 'telefone',         'label' => 'Telefone',       'rules'  => 'trim|required'),
                    'estado'            => array('field' => 'estado',           'label' => 'Estado',         'rules'  => 'trim|required'),
                    'cep'               => array('field' => 'cep',              'label' => 'CEP',            'rules'  => 'trim|required'),
                    'autoriza_endereco'   => array('field' => 'autoriza_endereco',  'label' => 'Autoriza Endereço',  'rules'  => 'trim|required'),
                    'autoriza_foto'     => array('field' => 'autoriza_foto',    'label' => 'Autoriza Fotos', 'rules'  => 'trim|required'),
                    'descricao'         => array('field' => 'descricao',        'label' => 'Objetivos',      'rules'  => 'trim|required'),
                    'site'              => array('field' => 'site',             'label' => 'site',           'rules'  => ''),
                    'video'              => array('field' => 'video',           'label' => 'video',          'rules'  => '')
                               
        ),
        'login_entidade_form'=> array(
                    'email_login'       => array('field' => 'email_login',      'label' => 'Usuário',         'rules'  => 'trim|required|valid_email|max_length[100]'),
                    'senha'             => array('field' => 'senha',            'label' => 'Senha',           'rules'  => 'required|min_length[6]|max_length[20]|md5') 
        ),
        'cadastro_vaga_form'=> array(
                    'area'                => array('field' => 'area',               'label' => 'Tipo de Voluntariado', 'rules'  => 'required'),
                    'atividade'           => array('field' => 'atividade',          'label' => 'Endereço',             'rules'  => 'required'),
                    'tipo_carga_horaria'  => array('field' => 'tipo_carga_horaria', 'label' => 'Tempo_disponivel',     'rules'  => 'required'),
                    'vaga_de'             => array('field' => 'vaga_de',            'label' => 'Vaga de',              'rules'  => 'required'),
                    'tipo_compromisso'    => array('field' => 'numero_horas',       'label' => 'Numero de Horas',      'rules'  => 'required]'),
                    'numero_vagas'        => array('field' => 'numero_vagas',       'label' => 'Numero de vagas',      'rules'  => 'required'),
                    'numero_horas'        => array('field' => 'numero_horas',       'label' => 'Numero de horas',      'rules'  => 'required'),
                    'comprometimento'     => array('field' => 'comprometimento',    'label' => 'Comprometimento',      'rules'  => 'required'),
                    'data_inicio'         => array('field' => 'data_inicio',        'label' => 'Data de Inicio',       'rules'  => 'required'),
                    'data_fim'            => array('field' => 'data_fim',           'label' => 'Data de Fim',          'rules'  => 'required'),
                    'data_postagem'       => array('field' => 'data_postagem',      'label' => 'Data de Postagem',     'rules'  => 'required'),
                  //  'dias_semana'         => array('field' => 'dias_semana',        'label' => 'Dias da Semana',       'rules'  => 'required'),
                    'descricao'           => array('field' => 'descricao',          'label' => 'Descrição',            'rules'  => 'required'),
                    'perfil_voluntario'   => array('field' => 'perfil_voluntario',  'label' => 'Perfil do Voluntário', 'rules'  => 'required')
        ),
        'cadastro_curso_form'=> array(
                    'titulo'               => array('field' => 'titulo',             'label' => 'Titulo do Curso',        'rules'  => 'required'),
                    'num_horas'            => array('field' => 'num_horas',          'label' => 'Numero de Horas',        'rules'  => 'required'),
                    'taxa_inscr'           => array('field' => 'taxa_inscr',         'label' => 'Taxa de Inscrição',      'rules'  => 'required]'),
                    'inscricao_ate'        => array('field' => 'inscricao_ate',      'label' => 'Periodo de Inscrição',   'rules'  => 'required'),
                    'data_inicio'          => array('field' => 'data_inicio',        'label' => 'Data de Inicio',         'rules'  => 'required'),
                    'data_fim'             => array('field' => 'data_fim',           'label' => 'Data de Finalização',    'rules'  => 'required'),
                    'data_postagem'        => array('field' => 'data_postagem',      'label' => 'Data de Postagem',       'rules'  => 'required'),
                  //  'dias_semana'         => array('field' => 'dias_semana',        'label' => 'Dias da Semana',       'rules'  => 'required'),
                    'horario'              => array('field' => 'horario',            'label' => 'Horário',                'rules'  => 'required'),
                    'local          '      => array('field' => 'local',              'label' => 'Local do Curso',         'rules'  => 'required'),
                    'descricao'            => array('field' => 'descricao',          'label' => 'Descrição',              'rules'  => 'required')
        ),
        'altera_curso_form'=> array(
                    'titulo'               => array('field' => 'titulo',             'label' => 'Titulo do Curso',        'rules'  => 'required'),
                    'num_horas'            => array('field' => 'num_horas',          'label' => 'Numero de Horas',        'rules'  => 'required'),
                    'taxa_inscr'           => array('field' => 'taxa_inscr',         'label' => 'Taxa de Inscrição',      'rules'  => 'required]'),
                    'inscricao_ate'        => array('field' => 'inscricao_ate',      'label' => 'Periodo de Inscrição',   'rules'  => 'required'),
                    'data_inicio'          => array('field' => 'data_inicio',        'label' => 'Data de Inicio',         'rules'  => 'required'),
                    'data_fim'             => array('field' => 'data_fim',           'label' => 'Data de Finalização',    'rules'  => 'required'),
                    'data_postagem'        => array('field' => 'data_postagem',      'label' => 'Data de Postagem',       'rules'  => 'required'),
                  //  'dias_semana'         => array('field' => 'dias_semana',        'label' => 'Dias da Semana',       'rules'  => 'required'),
                    'horario'              => array('field' => 'horario',            'label' => 'Horário',                'rules'  => 'required'),
                    'local          '      => array('field' => 'local',              'label' => 'Local do Curso',         'rules'  => 'required'),
                    'descricao'            => array('field' => 'descricao',          'label' => 'Descrição',              'rules'  => 'required')
        ),
        'cadastro_campanha_form'=> array(
                    'titulo'               => array('field' => 'titulo',             'label' => 'Titulo do Curso',        'rules'  => 'required'),
                    'data_inclusao'        => array('field' => 'data_inclusao',      'label' => 'Data da Inclusão',        'rules'  => 'required'),
                    'data_fim'             => array('field' => 'data_fim',           'label' => 'Data de Fim',             'rules'  => 'required]'),
                    'descricao'            => array('field' => 'descricao',          'label' => 'Descrição',              'rules'  => 'required')
        )
        
    );


