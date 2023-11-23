++<?php

require_once('../classes/class_conexao_banco.php');

function getDados() {
   $oConexao = new ConexaoBanco('localhost', 'root', '', 'agendatarefas');
   $rQuery   = mysqli_query($oConexao->oConexao, getSqlDados());
   $aDados = [];
   while($oDados = mysqli_fetch_object($rQuery)) {
      $aDados[] = $oDados;
   }
   return $aDados;
}

function getSqlDados() {
   return "
      SELECT tcodigo AS iCodigo,
             tnome AS sNome,
             tdescricao AS sDescricao,
             temail AS sEmail,
             tdata AS sData,
             CASE tclassificacao 
                WHEN 1 THEN 'Urgente'
                WHEN 2 THEN 'Normal'
                WHEN 3 THEN 'Baixa'
             END AS sClassificacao, 
             tconcluido AS bConcluido
         FROM tarefas 
      ";
}