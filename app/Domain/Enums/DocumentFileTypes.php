<?php

namespace App\Domain\Enums;

enum DocumentFileTypes: string
{
    // Documento único
    case UNICO = "UNICO";

    // Solicitud / Información general
    // Mandato
    case ORDEN_MANDATO = "ORDEN_MANDATO";
    case VARIO1 = "VARIO1";

    // Pago
    // Justificación del pago
    case IMPUESTO_TRANSP = "IMPUESTO_TRANSP";
    case EXENCION_IVTM = "EXENCION_IVTM";
    case IVTM = "IVTM";

    // Interesado / Titular
    // Interesado
    case CIF_NIF_NIE = "CIF_NIF_NIE";
    // Persona jurídica
    case IAE = "IAE";

    // Persona física
    case DNI_PAIS_ORIGEN = "DNI_PAIS_ORIGEN";
    case CERTIFICA_EXTRA = "CERTIFICA_EXTRA";
    case TARJETA_RESIDEN = "TARJETA_RESIDEN";
    case PASAPORTE = "PASAPORTE";

    // Acreditación representación
    case CIF_NIF_NIE_REPRE = "CIF_NIF_NIE_REPRE";
    case REPRESENTACION = "REPRESENTACION";
    case PODER_NOTARIAL = "PODER_NOTARIAL";

    // Acreditación representación Tutor
    case CIF_NIF_NIE_TUTOR = "CIF_NIF_NIE_TUTOR";
    case REL_TUTOR_TUTEL = "REL_TUTOR_TUTEL";

    // Acreditación de la propiedad del vehículo
    case FACTURA = "FACTURA";
    case CONTRATO = "CONTRATO";

    case ACTA_NOTARIAL = "ACTA_NOTARIAL";
    case DECLARA_RESP = "DECLARA_RESP";
    case ACTA_SUBASTA = "ACTA_SUBASTA";
    case ULTIMAS_VOLUNT = "ULTIMAS_VOLUNT";
    case DECLARA_HERED = "DECLARA_HERED";
    case IMPUESTO_SUCES = "IMPUESTO_SUCES";
    case SENTENCIA_JUD = "SENTENCIA_JUD";
    case SEPARAC_BIENES = "SEPARAC_BIENES";
    case ESCISION_FUSION = "ESCISION_FUSION";
    case ACR_ADJ_CONCURSAL = "ACR_ADJ_CONCURSAL";
    case ACTA_MANIFESTA = "ACTA_MANIFESTA";

    // Arrendamiento
    case AUTORIZA_INSCRI = "AUTORIZA_INSCRI";
    case CONTRATO_ARREND = "CONTRATO_ARREND";

    // Vehículo: Anexo
    case CERTIFICA_FINSE = "CERTIFICA_FINSE";
    case DUA_IMPORTACION = "DUA_IMPORTACION";
    case DUA_IMPORT_TERC = "DUA_IMPORT_TERC";

    // Otros
    case INSCR_MAQ_AGRIC = "INSCR_MAQ_AGRIC";
    case DOC_EXTRANJ_VEH = "DOC_EXTRANJ_VEH";
    case CERTIFICA_CONFO = "CERTIFICA_CONFO";
    case ACREDITA_ORIGEN = "ACREDITA_ORIGEN";
    case AUTORIZA_TRANSP = "AUTORIZA_TRANSP";
    case JUSTF_PAGO_IVA = "JUSTF_PAGO_IVA";
    case SUJETOS_PASIVOS = "SUJETOS_PASIVOS";
    case IMPUESTO_ITP = "IMPUESTO_ITP";
    case EXENCION_ITP = "EXENCION_ITP";
    case VIES = "VIES";
    case EMPADRONAMIENTO = "EMPADRONAMIENTO";
    case ACREDITA_DOMIC = "ACREDITA_DOMIC";

    case DENUNCIA_ROBO = "DENUNCIA_ROBO";
    case DECLARA_PERDIDA = "DECLARA_PERDIDA";
    case BAJA_MAQ_AGRICO = "BAJA_MAQ_AGRICO";
}
