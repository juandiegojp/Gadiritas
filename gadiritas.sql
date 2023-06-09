PGDMP         9        	        {        	   Gadiritas    15.1    15.1 \    p
           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            q
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            r
           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            s
           1262    27298 	   Gadiritas    DATABASE     ~   CREATE DATABASE "Gadiritas" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE "Gadiritas";
                gadiritas    false            t
           0    0    DATABASE "Gadiritas"    COMMENT     ]   COMMENT ON DATABASE "Gadiritas" IS 'Base de datos de Gadiritas para Proyecto final de DAW.';
                   gadiritas    false    3443            u
           0    0 
   SCHEMA public    ACL     (   GRANT USAGE ON SCHEMA public TO gadiritas;
                   pg_database_owner    false    6                        3079    44229    unaccent 	   EXTENSION     <   CREATE EXTENSION IF NOT EXISTS unaccent WITH SCHEMA public;
    DROP EXTENSION unaccent;
                   false            v
           0    0    EXTENSION unaccent    COMMENT     P   COMMENT ON EXTENSION unaccent IS 'text search dictionary that removes accents';
                        false    2            w
           0    0    FUNCTION unaccent(text)    ACL     7   GRANT ALL ON FUNCTION public.unaccent(text) TO gadiritas;
          public          postgres    false    235            x
           0    0 &   FUNCTION unaccent(regdictionary, text)    ACL     F   GRANT ALL ON FUNCTION public.unaccent(regdictionary, text) TO gadiritas;
          public          postgres    false    234            y
           0    0     FUNCTION unaccent_init(internal)    ACL     @   GRANT ALL ON FUNCTION public.unaccent_init(internal) TO gadiritas;
          public          postgres    false    236            z
           0    0 @   FUNCTION unaccent_lexize(internal, internal, internal, internal)    ACL     `   GRANT ALL ON FUNCTION public.unaccent_lexize(internal, internal, internal, internal) TO gadiritas;
          public          postgres    false    237            �            1259    52500 
   actividads    TABLE     �  CREATE TABLE public.actividads (
    id bigint NOT NULL,
    titulo character varying(255) NOT NULL,
    descripcion text NOT NULL,
    precio numeric(4,2) NOT NULL,
    duracion integer NOT NULL,
    max_personas integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id bigint NOT NULL,
    destino_id bigint NOT NULL,
    direccion character varying(255)
);
    DROP TABLE public.actividads;
       public         heap    gadiritas    false            �            1259    52499    actividads_id_seq    SEQUENCE     z   CREATE SEQUENCE public.actividads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.actividads_id_seq;
       public          gadiritas    false    229            {
           0    0    actividads_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.actividads_id_seq OWNED BY public.actividads.id;
          public          gadiritas    false    228            �            1259    52519    comentarios    TABLE     "  CREATE TABLE public.comentarios (
    id bigint NOT NULL,
    contenido text NOT NULL,
    positivo boolean,
    negativo boolean,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id bigint NOT NULL,
    actividad_id bigint NOT NULL
);
    DROP TABLE public.comentarios;
       public         heap    gadiritas    false            �            1259    52518    comentarios_id_seq    SEQUENCE     {   CREATE SEQUENCE public.comentarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.comentarios_id_seq;
       public          gadiritas    false    231            |
           0    0    comentarios_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.comentarios_id_seq OWNED BY public.comentarios.id;
          public          gadiritas    false    230            �            1259    52476    destinos    TABLE       CREATE TABLE public.destinos (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    comarca character varying(255) NOT NULL,
    codigo_postal integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.destinos;
       public         heap    gadiritas    false            �            1259    52475    destinos_id_seq    SEQUENCE     x   CREATE SEQUENCE public.destinos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.destinos_id_seq;
       public          gadiritas    false    225            }
           0    0    destinos_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.destinos_id_seq OWNED BY public.destinos.id;
          public          gadiritas    false    224            �            1259    52452    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    gadiritas    false            �            1259    52451    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          gadiritas    false    221            ~
           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          gadiritas    false    220            �            1259    52489    guias    TABLE     �  CREATE TABLE public.guias (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    tlf character varying(255),
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.guias;
       public         heap    gadiritas    false            �            1259    52488    guias_id_seq    SEQUENCE     u   CREATE SEQUENCE public.guias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.guias_id_seq;
       public          gadiritas    false    227            
           0    0    guias_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.guias_id_seq OWNED BY public.guias.id;
          public          gadiritas    false    226            �            1259    27300 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    gadiritas    false            �            1259    27299    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          gadiritas    false    216            �
           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          gadiritas    false    215            �            1259    52444    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    gadiritas    false            �            1259    52464    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    gadiritas    false            �            1259    52463    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          gadiritas    false    223            �
           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          gadiritas    false    222            �            1259    52538    reservas    TABLE     ;  CREATE TABLE public.reservas (
    id bigint NOT NULL,
    actividad_id bigint NOT NULL,
    user_id bigint NOT NULL,
    fecha date NOT NULL,
    hora time(0) without time zone NOT NULL,
    personas integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.reservas;
       public         heap    gadiritas    false            �            1259    52537    reservas_id_seq    SEQUENCE     x   CREATE SEQUENCE public.reservas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.reservas_id_seq;
       public          gadiritas    false    233            �
           0    0    reservas_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.reservas_id_seq OWNED BY public.reservas.id;
          public          gadiritas    false    232            �            1259    52431    users    TABLE       CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    apellidos character varying(255),
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    telefono character varying(255),
    password character varying(255) NOT NULL,
    is_admin boolean DEFAULT false NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    is_guia boolean DEFAULT false NOT NULL
);
    DROP TABLE public.users;
       public         heap    gadiritas    false            �            1259    52430    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          gadiritas    false    218            �
           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          gadiritas    false    217            �           2604    52503 
   actividads id    DEFAULT     n   ALTER TABLE ONLY public.actividads ALTER COLUMN id SET DEFAULT nextval('public.actividads_id_seq'::regclass);
 <   ALTER TABLE public.actividads ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    228    229    229            �           2604    52522    comentarios id    DEFAULT     p   ALTER TABLE ONLY public.comentarios ALTER COLUMN id SET DEFAULT nextval('public.comentarios_id_seq'::regclass);
 =   ALTER TABLE public.comentarios ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    231    230    231            �           2604    52479    destinos id    DEFAULT     j   ALTER TABLE ONLY public.destinos ALTER COLUMN id SET DEFAULT nextval('public.destinos_id_seq'::regclass);
 :   ALTER TABLE public.destinos ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    225    224    225            �           2604    52455    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    220    221    221            �           2604    52492    guias id    DEFAULT     d   ALTER TABLE ONLY public.guias ALTER COLUMN id SET DEFAULT nextval('public.guias_id_seq'::regclass);
 7   ALTER TABLE public.guias ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    226    227    227            �           2604    27303 
   migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    216    215    216            �           2604    52467    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    222    223    223            �           2604    52541    reservas id    DEFAULT     j   ALTER TABLE ONLY public.reservas ALTER COLUMN id SET DEFAULT nextval('public.reservas_id_seq'::regclass);
 :   ALTER TABLE public.reservas ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    232    233    233            �           2604    52434    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          gadiritas    false    218    217    218            i
          0    52500 
   actividads 
   TABLE DATA           �   COPY public.actividads (id, titulo, descripcion, precio, duracion, max_personas, created_at, updated_at, user_id, destino_id, direccion) FROM stdin;
    public          gadiritas    false    229   �n       k
          0    52519    comentarios 
   TABLE DATA           w   COPY public.comentarios (id, contenido, positivo, negativo, created_at, updated_at, user_id, actividad_id) FROM stdin;
    public          gadiritas    false    231   ��       e
          0    52476    destinos 
   TABLE DATA           ^   COPY public.destinos (id, nombre, comarca, codigo_postal, created_at, updated_at) FROM stdin;
    public          gadiritas    false    225   ��       a
          0    52452    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          gadiritas    false    221   ��       g
          0    52489    guias 
   TABLE DATA           �   COPY public.guias (id, nombre, apellidos, tlf, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          gadiritas    false    227   �       \
          0    27300 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          gadiritas    false    216   9�       _
          0    52444    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          gadiritas    false    219   0�       c
          0    52464    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          gadiritas    false    223   M�       m
          0    52538    reservas 
   TABLE DATA           l   COPY public.reservas (id, actividad_id, user_id, fecha, hora, personas, created_at, updated_at) FROM stdin;
    public          gadiritas    false    233   j�       ^
          0    52431    users 
   TABLE DATA           �   COPY public.users (id, name, apellidos, email, email_verified_at, telefono, password, is_admin, remember_token, created_at, updated_at, is_guia) FROM stdin;
    public          gadiritas    false    218   ��       �
           0    0    actividads_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.actividads_id_seq', 19, true);
          public          gadiritas    false    228            �
           0    0    comentarios_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.comentarios_id_seq', 1, false);
          public          gadiritas    false    230            �
           0    0    destinos_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.destinos_id_seq', 1, false);
          public          gadiritas    false    224            �
           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          gadiritas    false    220            �
           0    0    guias_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.guias_id_seq', 1, false);
          public          gadiritas    false    226            �
           0    0    migrations_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.migrations_id_seq', 139, true);
          public          gadiritas    false    215            �
           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          gadiritas    false    222            �
           0    0    reservas_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.reservas_id_seq', 1, false);
          public          gadiritas    false    232            �
           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 10, true);
          public          gadiritas    false    217            �           2606    52507    actividads actividads_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.actividads
    ADD CONSTRAINT actividads_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.actividads DROP CONSTRAINT actividads_pkey;
       public            gadiritas    false    229            �           2606    52526    comentarios comentarios_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.comentarios
    ADD CONSTRAINT comentarios_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.comentarios DROP CONSTRAINT comentarios_pkey;
       public            gadiritas    false    231            �           2606    52487 &   destinos destinos_codigo_postal_unique 
   CONSTRAINT     j   ALTER TABLE ONLY public.destinos
    ADD CONSTRAINT destinos_codigo_postal_unique UNIQUE (codigo_postal);
 P   ALTER TABLE ONLY public.destinos DROP CONSTRAINT destinos_codigo_postal_unique;
       public            gadiritas    false    225            �           2606    52485    destinos destinos_nombre_unique 
   CONSTRAINT     \   ALTER TABLE ONLY public.destinos
    ADD CONSTRAINT destinos_nombre_unique UNIQUE (nombre);
 I   ALTER TABLE ONLY public.destinos DROP CONSTRAINT destinos_nombre_unique;
       public            gadiritas    false    225            �           2606    52483    destinos destinos_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.destinos
    ADD CONSTRAINT destinos_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.destinos DROP CONSTRAINT destinos_pkey;
       public            gadiritas    false    225            �           2606    52460    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            gadiritas    false    221            �           2606    52462 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            gadiritas    false    221            �           2606    52498    guias guias_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.guias
    ADD CONSTRAINT guias_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.guias DROP CONSTRAINT guias_email_unique;
       public            gadiritas    false    227            �           2606    52496    guias guias_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.guias
    ADD CONSTRAINT guias_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.guias DROP CONSTRAINT guias_pkey;
       public            gadiritas    false    227            �           2606    27305    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            gadiritas    false    216            �           2606    52450 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            gadiritas    false    219            �           2606    52471 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            gadiritas    false    223            �           2606    52474 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            gadiritas    false    223            �           2606    52543    reservas reservas_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_pkey;
       public            gadiritas    false    233            �           2606    52441    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            gadiritas    false    218            �           2606    52439    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            gadiritas    false    218            �           2606    52443    users users_telefono_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_telefono_unique UNIQUE (telefono);
 E   ALTER TABLE ONLY public.users DROP CONSTRAINT users_telefono_unique;
       public            gadiritas    false    218            �           1259    52472 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            gadiritas    false    223    223            �           2606    52513 (   actividads actividads_destino_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.actividads
    ADD CONSTRAINT actividads_destino_id_foreign FOREIGN KEY (destino_id) REFERENCES public.destinos(id) ON DELETE CASCADE;
 R   ALTER TABLE ONLY public.actividads DROP CONSTRAINT actividads_destino_id_foreign;
       public          gadiritas    false    3260    225    229            �           2606    52508 %   actividads actividads_user_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.actividads
    ADD CONSTRAINT actividads_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 O   ALTER TABLE ONLY public.actividads DROP CONSTRAINT actividads_user_id_foreign;
       public          gadiritas    false    218    229    3241            �           2606    52532 ,   comentarios comentarios_actividad_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.comentarios
    ADD CONSTRAINT comentarios_actividad_id_foreign FOREIGN KEY (actividad_id) REFERENCES public.actividads(id) ON DELETE CASCADE;
 V   ALTER TABLE ONLY public.comentarios DROP CONSTRAINT comentarios_actividad_id_foreign;
       public          gadiritas    false    229    231    3266            �           2606    52527 '   comentarios comentarios_user_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.comentarios
    ADD CONSTRAINT comentarios_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 Q   ALTER TABLE ONLY public.comentarios DROP CONSTRAINT comentarios_user_id_foreign;
       public          gadiritas    false    3241    218    231            �           2606    52544 &   reservas reservas_actividad_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_actividad_id_foreign FOREIGN KEY (actividad_id) REFERENCES public.actividads(id) ON DELETE CASCADE;
 P   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_actividad_id_foreign;
       public          gadiritas    false    229    233    3266            �           2606    52549 !   reservas reservas_user_id_foreign 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 K   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_user_id_foreign;
       public          gadiritas    false    3241    218    233            i
      x��}�nYv���HLRԃK�RA��K�Bè�Ɉ�d�F�ɊGZ�Q{�_�
�
���@���x���9�L�6�.��x��~����G���e��~
��sȾ�W���k��h��W��_���R_�U�ڒ��k����߅���[E���k\�Z?��"�J_����u���y��ʭp�ƫ�u_w!�E�W��]��sy]��P�Yv#�wU���]�2�;ޗ������r��;��9[�_{��k�V�U��s�D�
�,˃|}ٸǋ_�!�l��G�\�
���y�6_U�ɺ��u���b����vNF���������9ސ�*��9��o�{�&�}+�����0uW�.���ߔ�[������?��]��0b��y��uY���;θqiU�G�f�[W��Ǜ�6z<�a�yɵ���x�VXc�Uh��X�~_�
�ظ�ݗ�fy��nʦ+1m��_��ˮ����o��:���c��:ރ?��g�q��c��%K�]h:��
�����/��|�l��>�k��²pU�q��._祫�d�1��Y���a)��9F���K��o�0~�XU���uX�*{�:�go}���3�ֆ��D0�FV�U�,���L��e k��=׿+אӾ�����YLvh˥�2�{/"���5>õ���C
^�U�]*�J�Ai_�ֵ&6��:m���/���]+k݊�����b����=99�rHa�}I��B��1h)I��S�؉cڝMY�}�rۄJ����F�G!&Ziwsx�����|���۸
WY������К�������ߢ�V�.���3�d��?�
���`Rݝ�b-��M	�1�ܶ/ �E�\��uS��aљU0U��^G�X����[�j8�w��l
�V�4Vq�^;��|~N��йY��N+C��Բ���go���C��`��|Yc�*�H��+��+���w�&Z�+�+��n����q���f�o |���i��X��T9��_�rSZ��>�g�?7b갂HM�����7���OxOX4N���v_����N���!F*6�&�9�y]��n �[�T
�5����m��~s�WmLYsnF�>�	0�Uþ��8�[L�[�
+��I�&9����ƿ_6����ר+��r���x�U�97�U����o<l�l�[�b��Vͬ�|�0/߆�Z�[�&�5�д�������an꒩{2a���7
���
��zSl#��ؓ׷��a_����C��4K�ɝ�U���0�k_,��U�Û� �Y�0=���Ǹ{w#��vq�B|56hO�a+hG�q�;�-	��oJ�X_>����vk�#��<Ņ�����#��>�⏸&R3V/��.w��
�G�'�''G�Gs������������b����=׎Ύ���[v	'g�����v�������cQ�����	�	����hqaq�e��Wk������
*�ŞV\㷢��S?����[q6�Y����2���M-w_,Vx�W��������j+��0��W5\�[L��V��TBޯM˶�}\�4��	�)��	]�X�-D`������C�S��C1 �0?L��T �(ÀC\Z#�W(b߅����q]S.�-��}S���uIt|$0ߗ��������� ��Y/���
:��}�����C��+x6�W��U7r�����OG���J����cY�~��90�U?��G_�	���h�+跧@w��
肨�	DI��jL�H[�[���p����<~�%��㙕�]n�(�9z�D��d�=�>r�� _�Ť��d�_���Ï�6vu��=�-�B@M2M�h�[�!��{~�"B9k�R��I�����TRt�"Y`&[���֢|��E��?�SN�
���ܚn�5�"�%1���:#��T`Ov
+��Q��uk8F�ë��%�S���%F��[?u�q�l�t�`:��o�g`"��ꠧζ|P��Hg n��v��k��$�ƒ@��ئ��'}�m<�T�0]X�k�&��B�Sj���q��[{:�)��CED���_�Vi"�bd�ImF�hE^�����@Ҿ������9��[���r�P�tq51���sI��ӓ��A��X_Qqn�����)�ѷc�qo1�	��qp�&G�-��сҿ.���h{�m�`9���B�v;(���)�h��A��rE�0���wp��3�B&Յ¥(���9:��&�O/�_�M,����A�O��5���X�H�����ы��O��"��QU��e/[���e�]� �+���׈x��{1DCT����?1��q_�-�ƨ��Oם�W����%l�~`U�Enf0��y���oɪ,K���PHb�n�ii���}C�����=�z B7�1dX ��J ��v��p�
ف�K,�-��.���<���
#%y�����R%���M#�߉���_�
�}��,{B��_~IBt~��5��h�,���N��[��M8���/
z���q���!R��ڿ�%�;�eE�t~��K�K��s��r�#`��:%?$d��3�
�
f�{��:{��B�M�}���}
!�}�'ZD�1�ʀ��g�}�����1G�����F��ݐ�U/!Y��;tƋ8�ч+.��eq^�d���F�^��z?�amJ(~�4�������G��6��*��ϲ����G����DF0��}������:�&��
G����`a�p]?�EC�q0+{� �N���5��5�؏
,4�?e�F���$�'
��\���V ��~q�Hb�8�0
A�r%wD��+�5qRϪ+|��Du]yU�ˏC	2*d�,��9�~��`�x���0��>��a�_6
l ��@��f�LD�d:�M�5ʹs��P_L�w��0M���j%�ktt�/܂�T��_�L.]F�?�+a�
�-� �a�Zr-F8�)���&�qv�"�.t��S�lª�	I�Q�q[�S�e;����F�|���VEl��T ���E��U�
��{Q�͠�D�ǿ�734���K	��fC� x;7�(� �C��M��2'l�%i"�a�2
E���F��D���b���6I��+y� iҫf	r��z�6>�Ih�0k(K%�}%{��`�s11R;�+� ~�Ncr|W��@��̟<=����'O�|?�j����(��u�8薞��Ӌ١W�Tt�w�M L��KX�z�$�$
�
Â�\c�s�e])�L|r��m� E��&��x�J�"^P�#����"��P�	�U|��b�%"1�������Q#��j�CV{�X0|Ȩ�,<���CC �3��-��~o0r��'������$��[!�0�F�:�~�5�tb�8�M)�#�v��{�܂�N�N����,$E^S�4"|�<KI)\���ۦ�U'���
F����q������(-}���I�,|�L�^�=!���d�/i7��tm�d~:�Ct��aۀQ�b�I*���P��·���TCKWK���ђѓ�͵�۾��
���8�K*���Y��dFc�Ɥ^2����@�}���ZFP�,��k��|�Qą�P'E��7*A���2x�H-����S����%�olyʵ�
\3
q���:��QI�(>}e	h�1y������Ȯ ��>z�6��b�.RY�����/����S�g$�DOs��0�c	[ _/#�+���oc6k�е���)o����,��˟�k�߆�IS�Ġ-"1����)�.�<M�%�,��&>��:?���`�h>����W��������)b����%2U����������{I
d~j�Y�P�e`�R+$��^�v��:5\[��@GXi�H�A�����Ar� k�=7BU��!���A��*W��΢���ɖ@"�z�����Yx]q/��-�A��J�]A�c2Rг��J�%�����Ga��WW��#=$=�q�e�xr��z�o>/1�k2_BF�� ��j I�Gvi��J�{-�j�$[�9�������������kgG�Go��0��`�i�������o���PG�7�ٓ(f�ݩn��\Ժ�(��Cp��    �
s�WO�<�~���D^���웲�j�����l`ɼ�^$��e��Gi����[�$���f���Ǉ(W*rN^1�_�:�f����n�b�E�|�=jZ�(s�g�*W|��E��f�4�@��B8r�˞��b�ԛ�������S������5!��4�����!!���226�?Gp}i�xK��E+��ۑ������p��gy�p?z2�w_�K�h�ُp����e�G�-�XL����%5%�r�B[?�eD�9W����!�(���8{�j�=���q-8��Z�����{8����
@O;����%�!��l�N��x��Q�[�Y�V8֪k��bEk�$3�:`�@
�ޮ� �J��bM�X!������F0hE#����΂}������4��l�T��ӰG耰b��V����6�����{r��Z؇%�EmnA�A�N�/b����by~��'E�e?�=�F�%<Y�V��]c�Kh�?d��Z̈�F��vQ0�hLN�aP��f?`�bY���q\�H��w�2q��u�	�*׻/��C5s�O+�n�qH�'����,�?�8�g��]����ͲG��yz�V-.�cSyW���f!��*��[ȃ�^�����<RC[!��88g�����%�3���j�n�
��U}�v�W<�M���g�P������� W��q�qB�F�ﲗ��2ʇl�R �8��J��H�	C1;�w��
Z*\J����f���Ǖ��{���2�"V������!�OxY��+׷V{���Lav��z�k_� l�Nl@�r2}
�z�� Yz�>ĥ6��t����e��gG�*y��b��Ult��H�}�`�
[M��w�
y�K�������քJ����r,���n(��y�f����ڦ�ʫ�+�O�⬻��-� �]
��O��%�=�xΉl���<$!��U `"D&?p��G
����|��$�;���Ǒ�+�q�]��?c��d X�ͳ]!+�q]�ebg#[�
o��w�d�4�O'NYhh&�o]*]p�%�*S��Y#�'1����\�x�p\g�m�ȭ��\WC4Myb�z����॰Y"��[���0Yn����`/���͸6n\�'>M7� ��|[�ɀ�\���.V�R�
%��Ҳ�TE���B�ژ�͵x;�W�O����I���1�>�ʨڇU_�>�0�Yx+ڭh1	�aT���(P(�T�;�:��.�घB1tvw�3#���F!; ��¨e��јe$��<V`=i�i�t'���Dk�2�k=L�R��v7��V���'L���j��L�)f3�0�E߲bGv�9u21��eFq#mZw&�$M��`�؀f�-74�(��龍am�L�Fڱ�-�/E�����$9Ψ*���"޼�� b3+X�=�޺��^��o�u/%��
�8��4��J�!'��.8oʅ�K�
>
ٷZ%�y˂��X��&T����,��Q<|M0I�żyl+#�NP�ǥ���q�֣L��ƚ2��"\암i���9��b[%�bf8�oe(F��`4Z1�%�9IM0�����Q!�����[�<QT4!]��f�|�$R$A�VE�E�S#m���#�R�;�.�Ji"�a��e���S��ŀxc��*���x�L��©����:݋�/e��?2����j�u�X-�a�8C'����8tK�T2:^�
D+
��F#l6�0�m��j2н���}��β�^�+�=3*:�3�t�9|{�I�>��#�;P/,|�	�M�>Y�n�!�;���ȶZ[Qk�#Ე����l���f�#9 �ȤTy�r�4���Q�G���5����Y�̔b%�z7����I�A�����^H1�v�}m~�z�#9��u�[U�*�ɰ&g1b��ʠ�_r��F? ��w|��,B�Q�o��H��m��ۋ�p���k�7�89�uY��E�9.���V܂��J�U������+[�P%��r`�:�i5�X!.�$VI������.�B.��e�
m���R2M
�zh� B�����ы�xn��DK7������������g
m�\���I҃w�qt��P��~��ذ�؞�a��Ү�p9��E��uܦ� _]�r7L�~#�޷��Zֳ�	.��[9N��_j�F�HI�u7v��3iKH�a,�cH%�+i�Yd�m�-=z�4ĵ8+����	l��U�s�R��i�����#��FFSCdube�d,�˳��bŊX��]���|��J��p� $/����==������q?c?��1w�'����vE�[Q�ޗ�]�],�q�E�c8s߰
8Lcr"��>p�+��B	JSj�
�4<d�V�f����U�ӫ7��q���AV�AZ�t,R��F��]�])tjU�S~/6�8�R}�y�@��@N�
����}��ϒ�p�΍�+ceS���ec��W>�_�?�f )���Ӥ���X�2���a]�p 1ʔ��LFB3�Zb�ZY�����׸:�!��f1��C-S�����K����<��6��,l��̒�r��׫���^&>�~��{5T���+�����QD���@֊>�q�s�RNkƻ�F���R��	��L@W���-���ڦ���=��?�8;|�!�O�ͷ�JD@5�8=1���tR��nl?7�Z����q_�$�N�bՉ�2p��4�cd��2E���rfa�ʉ��L!(7Xj�1�V�NJ&a�|,��Τ�oZ�7��*���٧ܞɏ�)�g�e&M�^Bt��*".�t8��WC��+o}�z+}�\r-ޗ��"�kOv����Z��7�"�a��5V��D�uy#���jc5Я�Xk��36bw`��ߔ���<�rD�������� ��2���2�j��(%�_c�GQ'�ek�:B��~E}�I�-����)woU#��S���X������R��2^MG�z�'��k�M4�B�pm��q�x?�b2�_4	�\����,f߹O0�aD���;����K6����Mkb��ӯGu����U�r�i+��*�k�ڬT�s���4�o6n��J�qX��aC���ǈ��p�P�=+�o�x`�ō,ԶxA	 I�1ϱ�Ѳp�V��c��Tb����xnB �}f���Ba�[���Ywv���͌�����;�R�K����� �NS�_i?�}-���wI"�F
�<�x	֤�G?K�8B�u����T ��BW�䤌�)����Xk���%u/�@���nm�J�C;��� �h���Q�Wj������v��QHA������Z��Z��9�����F��t��Wk��Ju�j�����ob�ǐ��pZ]��O
�RѤ)Y�����ƔB�E%Z��*�*
mѾ��X.12��z<f�o�
-��HC�&�
��P�����B�]H��~EX�/��ͽ^���ZGf>�� �����Xף�@3%1��q�������x]Xuw�6�1��v%�6]����<��ϸ�g�E���>�jA��t���:H�䵙@����0�C+hd�k�ېz��M�Q#c�6^��E������X�!�(Q���ֲ���ө5����	�o�'���g89GO�pֆW�kRXr�D6h�d�4��ɾ����1y�c��Ͳ�A����I�q��D���P/;?>�h44.�V��ѭ�M��T�T)b�x�>禯�!7�]�0[���N�<9ͨ��t4�$BÒ⎍��c'����&��lm�te
�X
��4�x��ce
�h<2�g��W�k�o˚H�rǊ���љE�[6����u�C�ǏN��z�G����+���CN��*�H��f}��F
���D�� @��*����RE<$l��1�/5ŷ���Bk�	'V"�U�3�,Ҏ������h�{c�	v��M��0,_�^�_��y��x��G���Py2C�$�
�����~<�B1�V屼�[Ϛ +��&@L�}X�ݔ�T�d�:��^.k���A6>�b��fX�}ٹW�K�"&�X���,|ގ(xGRI�bk�G�B�����/�����Z1m��X���yܮ�"[�cQ ���E�-?.�y|v�r�� �  g'#��4�^O���ӝ=��
ӔxJq�(x���:옿�
A�����؅���,][�-hw���e.p�Y.[�"T�t��٫�Q%���	�
��%�d�t?��@>Ð�S��`�4=��)bLP`���J	��f8%B�WZe����F@��Ȓl�#QL��N���C<P��*^t�k��:�9���h�S�k��!�����U�����	��϶�cFsP�U�9׆��uvp�v.ǋ%xi_��^��P�qp+9���Xћ�B���I�^��h��Pɛ��x���QPJ��8��ڪ<}%n�W)ة��8=>`�ece�<
m�F3�#����[a�t-O�;���.�<�q�ݜ�A���6R�_T�O��nL��/�+<���=f�I�P��"Yy;�&����[�r�m�P������f�v�u��'��>w�N�0I�ς88�L���N�̏�������}�5�r=�khU�N�fY_U�Ua���y�閱�uZ�5:��j�*�7ʽ*��֪E�6�'+�qH�.V&��ܵ���7K��p���(:�c\,���u�������(8w4_���
��
��ȍ)���1�t7w���c
�3�Tyj�[�Z������}�-ڲsc`j>�L���@j�l~qz�����g��P��Ѯ''�)�yt�m#�Y�L~I���ŤA�do�^P�!�+���C{�
�5��q��6F!�^�����/�¸_CAb�]��0���F�����B��
�܊	ٟ<��cf�O�R�(h��Nz�M�Vz8?��H.P��0G�G�0��Wf�b
�{6��d�*���e'��W�"t�ER�'\��Z�֖A��YJ%.
���<��$���8t��.�q#�)��
�+�=������1�����^��Z�
u�''gI@?)��@�k�� 3�������軿��B�+a�{�=�ԩ5����ˎ�(��u,.y��,Ԍ{wU�z|qS����Q�v�0��mQ��Nc��{�X�cm�����j�y�gȎ�X��'�D�Og�l4>e�A+�+�='R��}+=���̤�xR�X�/�:J'f�%�#�H�s׻Ϸ,�v&
+XTf���g1��(SS
Ϯ\-�#R??z(#�e�p;��㩈�RuNk&{�7������2[*%]���.��R�ީ����)�,��Ґ�ǐ��S��{E�^�����N�xML�p����ǦO�^<I'E��Ũ�h��4�`�l�T��cAWLl��74��<+���J|P0`8�q��e>y�����γseL
��}
գk�g9�a�Xi"dV3t|���{ˆ��t0[Q�
A���oi�N쪴cN먬��!��������K�թR���k��{ߤ����N��Զ$gM�cm�W&:���1u���Z^��5ӵ��/�t-S��vj�-ר]W���v�U]�L<Y�汿J����d���+Dp�.�P�nK
�����`M���Hd�<g�Yǂu��-?��/W�uL����gB�V�GĲϘ>�-ɘ��T��xu �+y��84�9��U;_����J�������҂��Rt�Ng`7�%��_�m�ù�zp�5����I���"���pk���[L��+�`��ȳtjA��R�t����ˊ��n8P�lT���`��z@�5�R;ڦ6~�M���1>f˗��^l
��~H����h����Q�E;
"������7��?���A���~ZSޕ�0\�v?��M`��s�\*����zt@ob��h�WX���B��3��}b>��;���̪�f���D*�����8&�_��7%��	�(g5j�w�(5�;Z�y:��Kr|^4���s�ӈlw�e�sU1s�k9�4t%�!�~6���sX���$����F@s����� ��FG��ח�PNՀ�\�C��H��'ʈT�����j�&�4U��eǢ�F�?���mYKH���H��bHkgFG�� ��_�I14ʆ��:?�h�BO�I����\�dԄ���<m�\(/����BG�dA��XC��d�D�����lu��Cr`^,����g@��߽�ڵiV�'8�db�I����
3,�j�����3���S�94!!��''3I�p�KQ�5et��Dl!|������b�C���3�����
0���[}U��
���C�˾I�^
�}�da�
��tok���������kC�E͑c�NJ>LP���8��x-qB~������Pj�̂����ꮦ��e�����%j����e㗣
��c��ڲa���m|9=��{�_JU�a���Q��r�y\�~�y|���;{��;�E����齫
���8����5a1j�`��Y+9��)7��`BY��}� be]�{G�%Ll�Ǟe\��2�^�ʥ�D���Mk�$��P����隡3d�c�,���R�����')d��m���o�Ҍ�����dd��jS���i����, &;G��1WB%��;�6%X�����,����>��
)�x=0�e}%�د�?~r�E��'g�
���Ĺ��v�)�cNz֊��ugE�&�ʼR�+ӏ{�&揋�\�Q݌F��:� 
%1�Ҏ��hνӈ��.=�FN�"�M��y� u��ߕ����A�?�ا�C�Jj�X�t��L�w$��~�m=K�h	��r��7�(�X��6I�16�即j�pŢ�YD��PYm�d!��Nӑn���3�E���юDŔ�j����"��Mx)�t	��t����GJ�eH����Z���NZץp$>}�}9f��FZH�QbZm8:Ow��ǒ>�YҍN�������O|�}��_i<e���)'�9%���v�m���i茰�3Įv,���X[����k
~M���s�iH6e��{
;O�|���?%���~:<�lz��JAw4��46��/�P]ɇR�
�����$����
:?�8���=��+%O{z��9����n�?�      k
   
   x������ � �      e
   F  x�m�MN�0F��S�E��Ώ�� ���.�L��Fi\9馷� ,ز��pZ6$�>y���3)���h]K�r]O��yg�� �R��!��X�$�*�1&���1G2s�Z�#c
*j���<�
_��t0u�*��Th�1�2�z�;}�h�,"�E��V�gmϰ���Ec�?�(���H-f���n�t2�w�#t�6�3�VbQi��+am�9��
�;����P�G;|_��A+E:U�ZECSۖ��]k	���
�A�|��Ԫ�1�[����R���<5=��J��J��<�&P�޴��������:��	����rzq
���˅����/�ǵ      a
   
   x������ � �      g
   
   x������ � �      \
   �   x�m��n� E������M�/�,��-����%�v<��݋
8P�!PHj}d�p�$��2�'9@Z�(4�7�t�Q�$�r���V��#���l�7��8��Z��P��]�=kif���������&��'@T��:I�ϡ�MC#�fOz�x�����6��w�j�����6|ɜ9��K�(�ل��xm���q���z v���b������r��j����x��__����n�f      _
   
   x������ � �      c
   
   x������ � �      m
   
   x������ � �      ^
   V  x�u��r�<���Sd�m;� �0�q���z#ly [2�ި��G��~��Ћ��T*ݳP}uϹW��'3�	�>+ѧ�����9@Q���n>��1��g��,
�rT�vu8���$�/��B�k�����^�i����;�s�)Dm�k���I��o��M�O�`�!B�s�8��W�OP�UY��;��QTM��~g��!�U0��r��)��Н�Ao�����i+�����Kt��}7�A�`TEgj
'�AԢ*�`���ςA')"ԡ�to$uySƫ}O§���;>\���m�W��{l?t����C��W:ѐCV�Z�u@����/?	����7��5Ι���Nث�(��`�p'�����vD��l���V/F�d�Q�Ul�ZGsy�I��/����+����6���F��W��3�\ż���>�h������S��t�6F+7�=�S/��yG¡^�S�q��"@LH�P$��p*�%�9�{�U`�,�j�/Kz��+�h�uy���ݖ/6Ói�S�.M=;3~�j���j�eQc&d�?]���p
�Q��2+��Y�%Q�˘��^/=5�vw�!�yf������/��`
�x[(�rK� uF��Q�HL��t0���'�*��B`Ck�\�Z爄�����jIy�s���`
�����œґ�q�Nk�F��,����J����N�kך&�h�"Sk8�
�����5{��9w�Z�JH��'��>��R���$��h�iR�d���c��E��g-����!
L���5��*����O��H��HUxt�蚳�M��n��fF��a�.�bm�I�XִZZh֪�9-
�ޑeCP�Z���9��A�S     
