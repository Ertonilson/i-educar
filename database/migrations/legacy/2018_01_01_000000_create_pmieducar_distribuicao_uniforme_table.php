<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreatePmieducarDistribuicaoUniformeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            '
                SET default_with_oids = true;
                
                CREATE SEQUENCE pmieducar.distribuicao_uniforme_seq
                    START WITH 1
                    INCREMENT BY 1
                    NO MINVALUE
                    NO MAXVALUE
                    CACHE 1;

                CREATE TABLE pmieducar.distribuicao_uniforme (
                    cod_distribuicao_uniforme integer DEFAULT nextval(\'pmieducar.distribuicao_uniforme_seq\'::regclass) NOT NULL,
                    ref_cod_aluno integer NOT NULL,
                    ano integer NOT NULL,
                    kit_completo boolean,
                    agasalho_qtd smallint,
                    camiseta_curta_qtd smallint,
                    camiseta_longa_qtd smallint,
                    meias_qtd smallint,
                    bermudas_tectels_qtd smallint,
                    bermudas_coton_qtd smallint,
                    tenis_qtd smallint,
                    data date,
                    agasalho_tm character varying(20),
                    camiseta_curta_tm character varying(20),
                    camiseta_longa_tm character varying(20),
                    meias_tm character varying(20),
                    bermudas_tectels_tm character varying(20),
                    bermudas_coton_tm character varying(20),
                    tenis_tm character varying(20),
                    ref_cod_escola integer,
                    camiseta_infantil_qtd smallint,
                    camiseta_infantil_tm character varying(20)
                );
                
                SELECT pg_catalog.setval(\'pmieducar.distribuicao_uniforme_seq\', 1, false);
            '
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pmieducar.distribuicao_uniforme');
    }
}
