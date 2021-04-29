<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../languages/lang_no.php

//translator(s): Wiggo Eriksen (Prosjektledelse.no)
$byteUnits = array('Bytes', 'KB', 'MB', 'GB');

$dayNameArray = array(
    1 => "Mandag",
    2 => "Tirsdag",
    3 => "Onsdag",
    4 => "Torsdag",
    5 => "Fredag",
    6 => "Lørdag",
    7 => "Søndag"
);

$monthNameArray = array(
    1 => "Januar",
    "Februar",
    "Mars",
    "April",
    "Mai",
    "Juni",
    "Juli",
    "August",
    "September",
    "Oktober",
    "November",
    "Desember"
);

$status = array(0 => "Kunde fullført", 1 => "Fullført", 2 => "Ikke begynt", 3 => "Åpen", 4 => "Utsatt");

$profil = array(
    0 => "Administrator",
    1 => "Prosjektleder",
    2 => "Bruker",
    3 => "Kundebruker",
    4 => "Disabled",
    5 => "Prosjektleder Administrator"
);

$priority = array(0 => "Ingen", 1 => "Veldig liten", 2 => "Liten", 3 => "Middels", 4 => "Høy", 5 => "Veldig høy");

$statusTopic = array(0 => "Lukket", 1 => "Åpen");
$statusTopicBis = array(0 => "Ja", 1 => "Nei");

$statusPublish = array(0 => "Ja", 1 => "Nei");

$statusFile = array(
    0 => "Godkjent",
    1 => "Godkjent med endringer",
    2 => "Trenger godkjenning",
    3 => "Ingen godkjenning nødvendig",
    4 => "Ikke godkjent"
);

$phaseStatus = array(0 => "Ikke påbegynt", 1 => "Åpen", 2 => "Ferdig", 3 => "Suspendert");

$requestStatus = array(0 => "Ny", 1 => "Åpen", 2 => "Ferdig");

$strings["please_login"] = "Vennligst logg inn";
$strings["requirements"] = "Systemkrav";
$strings["login"] = "Logg inn";
$strings["no_items"] = "Ingen tilgjengelige resultater";
$strings["logout"] = "Logg ut";
$strings["preferences"] = "Preferanser";
$strings["my_tasks"] = "Mine oppgaver";
$strings["edit_task"] = "Redigere oppgave";
$strings["copy_task"] = "Kopiere oppgave";
$strings["add_task"] = "Legge til oppgave";
$strings["delete_tasks"] = "Fjerne oppgaver";
$strings["assignment_history"] = "Oppgavens historikk";
$strings["assigned_on"] = "Tildelt dato";
$strings["assigned_by"] = "Tildelt av";
$strings["to"] = "Til";
$strings["comment"] = "Kommentar";
$strings["task_assigned"] = "Oppgave tildelt";
$strings["task_unassigned"] = "Oppgave ikke tildelt";
$strings["edit_multiple_tasks"] = "Redigere flere oppgaver";
$strings["tasks_selected"] = "utvalgte oppgaver. Velg nye verdier for disse oppgavene, eller velg [ingen endring] å beholde eksisterende verdier.";
$strings["assignment_comment"] = "Oppgavekommentar";
$strings["no_change"] = "[Ingen endringer]";
$strings["my_discussions"] = "Mine diskusjoner";
$strings["discussions"] = "Diskusjoner";
$strings["delete_discussions"] = "Slette diskusjoner";
$strings["delete_discussions_note"] = "NB: Diskusjoner kan ikke åpnes igjen når de er slettet.";
$strings["topic"] = "Tema";
$strings["posts"] = "Postlegge";
$strings["latest_post"] = "Siste post";
$strings["my_reports"] = "Mine rapporter";
$strings["reports"] = "Rapporter";
$strings["create_report"] = "Opprette rapport";
$strings["report_intro"] = "Velg oppgavens rapporteringsparametre her og lagre forespørsel på resultatlisten etter å ha åpnet rapporten.";
$strings["admin_intro"] = "Prosjekttilpasninger og konfigurasjoner.";
$strings["copy_of"] = "Kopi av ";
$strings["add"] = "Legge til";
$strings["delete"] = "Slette";
$strings["remove"] = "Fjerne";
$strings["copy"] = "Kopiere";
$strings["view"] = "Vise";
$strings["edit"] = "Redigere";
$strings["update"] = "Oppdatere";
$strings["details"] = "Detaljer";
$strings["none"] = "Ingen";
$strings["close"] = "Lukk";
$strings["new"] = "Ny";
$strings["select_all"] = "Velg alle";
$strings["unassigned"] = "Ikke tildelt";
$strings["my_projects"] = "Mine prosjekter";
$strings["project"] = "Prosjekt";
$strings["active"] = "Aktiv";
$strings["inactive"] = "Inaktiv";
$strings["project_id"] = "Prosjekt-ID";
$strings["edit_project"] = "Redigere prosjekt";
$strings["copy_project"] = "Kopiere prosjekt";
$strings["add_project"] = "Legge til prosjekt";
$strings["clients"] = "Kunde";
$strings["organization"] = "Kundeorganisasjon";
$strings["client_projects"] = "Kundeprosjekter";
$strings["client_users"] = "Kundebrukere";
$strings["edit_organization"] = "Redigere kundeorganisasjon";
$strings["add_organization"] = "Legge til kundeorganisasjon";
$strings["organizations"] = "Kundeorganisasjoner";
$strings["owner"] = "Eier";
$strings["home"] = "Hjem";
$strings["projects"] = "Prosjekter";
$strings["files"] = "Filer";
$strings["search"] = "Søk";
$strings["user"] = "Bruker";
$strings["project_manager"] = "Prosjektleder";
$strings["due"] = "Frist";
$strings["task"] = "Oppgave";
$strings["tasks"] = "Oppgaver";
$strings["add_team"] = "Legge til medlemmer i teamet";
$strings["team_members"] = "Medlemmer i teamet";
$strings["full_name"] = "Fullt navn";
$strings["title"] = "Tittel";
$strings["user_name"] = "Brukernavn";
$strings["work_phone"] = "Telefon arbeid";
$strings["priority"] = "Prioritet";
$strings["name"] = "Navn";
$strings["description"] = "Beskrivelse";
$strings["phone"] = "Telefon";
$strings["address"] = "Adresse";
$strings["comments"] = "Kommentarer";
$strings["created"] = "Opprettet";
$strings["assigned"] = "Tildelt";
$strings["modified"] = "Modifisert";
$strings["assigned_to"] = "Tildelt";
$strings["due_date"] = "Tidsfrist";
$strings["estimated_time"] = "Estimert tid";
$strings["actual_time"] = "Faktisk tid";
$strings["delete_following"] = "Slett følgende?";
$strings["cancel"] = "Annuler";
$strings["and"] = "og";
$strings["administration"] = "Administrasjon";
$strings["user_management"] = "Brukerledelse";
$strings["system_information"] = "Systeminformasjon";
$strings["product_information"] = "Produktinformasjon";
$strings["system_properties"] = "Systemegenskaper";
$strings["create"] = "Opprett";
$strings["report_save"] = "Lagre rapportforespørselen til din hjemmeside slik at du kan foreta forespørselen igjen.";
$strings["report_name"] = "Rapportnavn";
$strings["save"] = "Lagre";
$strings["matches"] = "Antall treff";
$strings["match"] = "Treff";
$strings["report_results"] = "Rapportresultater";
$strings["success"] = "Fullført";
$strings["addition_succeeded"] = "Har lagt til";
$strings["deletion_succeeded"] = "Har slettet";
$strings["report_created"] = "Rapport er opprettet";
$strings["deleted_reports"] = "Rapport er slettet";
$strings["modification_succeeded"] = "Har foretatt modifisering";
$strings["errors"] = "Har funnet feil!";
$strings["blank_user"] = "Bruker ikke funnet.";
$strings["blank_organization"] = "Kundeorganisasjonen ikke funnet.";
$strings["blank_project"] = "Prosjektet ikke funnet.";
$strings["user_profile"] = "Brukerprofil";
$strings["change_password"] = "Endre passord";
$strings["change_password_user"] = "Endre brukers passord.";
$strings["old_password_error"] = "Det gamle passordet du har oppgitt er feil. Vennligst oppgi det gamle passordet på nytt.";
$strings["new_password_error"] = "De to passordene du har oppgitt er ikke like. Vennligst oppgi ditt passord.";
$strings["notifications"] = "Melding";
$strings["change_password_intro"] = "Oppgi ditt gamle passord, velg \"Enter\" og bekreft det nye passordet.";
$strings["old_password"] = "Gammelt passord";
$strings["password"] = "Passord";
$strings["new_password"] = "Nytt passord";
$strings["confirm_password"] = "Bekreft passord";
$strings["email"] = "E-post";
$strings["home_phone"] = "Telefon privat";
$strings["mobile_phone"] = "Mobil";
$strings["fax"] = "Faks";
$strings["permissions"] = "Rettigheter";
$strings["administrator_permissions"] = "Rettigheter for administrator";
$strings["project_manager_permissions"] = "Rettigheter for prosjektleder";
$strings["user_permissions"] = "Brukerrettigheter";
$strings["account_created"] = "Konto er opprettet";
$strings["edit_user"] = "Redigere bruker";
$strings["edit_user_details"] = "Redigere detaljer i brukerkonto.";
$strings["change_user_password"] = "Endre brukerpassord.";
$strings["select_permissions"] = "Velge rettigheter for brukeren";
$strings["add_user"] = "Legge til bruker";
$strings["enter_user_details"] = "Oppgi detaljer for brukerkontoen du oppretter.";
$strings["enter_password"] = "Oppgi brukerpassord.";
$strings["success_logout"] = "Du har nå logget ut. Du kan logge inn igjen ved å skrive inn navn og passord nedenfor.";
$strings["invalid_login"] = "Brukernavnet og/eller passordet du har oppgitt er ugyldig. Vennligst oppgi innloggingsinfo.";
$strings["profile"] = "Profil";
$strings["user_details"] = "Detaljer brukerkonto.";
$strings["edit_user_account"] = "Redigere kontoinformasjon.";
$strings["no_permissions"] = "Du har ikke rettigheter til å utføre denne aktiviteten.";
$strings["discussion"] = "Diskusjon";
$strings["retired"] = "Utdatert";
$strings["last_post"] = "Siste post";
$strings["post_reply"] = "Svar til post";
$strings["posted_by"] = "Post fra";
$strings["when"] = "Når";
$strings["post_to_discussion"] = "Post til diskusjon";
$strings["message"] = "Melding";
$strings["delete_reports"] = "Slette rapporter";
$strings["delete_projects"] = "Slette prosjekter";
$strings["delete_organizations"] = "Slette kundeorganisasjoner";
$strings["delete_organizations_note"] = "NB: Dette vil medføre sletting av alle kundebrukere for disse kundeorganisasjonene, og bryte forbindelsen mellom kundeorganisasjonene og alle åpne prosjekter.";
$strings["delete_messages"] = "Slette meldinger";
$strings["attention"] = "Obs";
$strings["delete_teamownermix"] = "Fjernet, men eieren av prosjektet kan ikke fjernes fra prosjektteamet.";
$strings["delete_teamowner"] = "Du kan ikke fjerne eieren av prosjektet fra prosjektteamet.";
$strings["enter_keywords"] = "Oppgi nøkkelord";
$strings["search_options"] = "Nøkkelord og søkemuligheter";
$strings["search_note"] = "Du må oppgi informasjon i søkefeltet.";
$strings["search_results"] = "Søkeresultater";
$strings["users"] = "Brukere";
$strings["search_for"] = "Søk etter";
$strings["results_for_keywords"] = "Søkeresultat for nøkkelord";
$strings["add_discussion"] = "Legge til diskusjon";
$strings["delete_users"] = "Slette brukerkontoer";
$strings["reassignment_user"] = "Endre tildeling av prosjekt og oppgaver";
$strings["there"] = "Det er";
$strings["owned_by"] = "eies av brukerne ovenfor.";
$strings["reassign_to"] = "Før sletting av brukere, tildel disse til";
$strings["no_files"] = "Ingen opplenkede filer";
$strings["published"] = "Publisert";
$strings["project_site"] = "Prosjektområde";
$strings["approval_tracking"] = "Søker godkjenning";
$strings["size"] = "Størrelse";
$strings["add_project_site"] = "Legge til prosjektområde";
$strings["remove_project_site"] = "Fjerne fra prosjektområde";
$strings["more_search"] = "Flere søkemuligheter";
$strings["results_with"] = "Finn resultater med";
$strings["search_topics"] = "Tema for søk";
$strings["search_properties"] = "Søkeegenskaper";
$strings["date_restrictions"] = "Datorestriksjoner";
$strings["case_sensitive"] = "Identisk treff";
$strings["yes"] = "Ja";
$strings["no"] = "Nei";
$strings["sort_by"] = "Sorter etter";
$strings["date"] = "Dato";
$strings["all_words"] = "alle ordene";
$strings["exact_match"] = "helt likt";
$strings["all_dates"] = "Alle datoer";
$strings["between_dates"] = "Mellom datoene";
$strings["all_content"] = "Alt innhold";
$strings["all_properties"] = "Alle egenskaper";
$strings["no_results_search"] = "Søket ga ingen resultater.";
$strings["no_results_report"] = "Rapporten ga ingen resultater.";
$strings["schema_date"] = "ÅÅÅÅ/MM/DD";
$strings["hours"] = "timer";
$strings["choice"] = "Valg";
$strings["missing_file"] = "Filen mangler!";
$strings["project_site_deleted"] = "Prosjektområdet er slettet.";
$strings["add_user_project_site"] = "Brukeren har nå tilgang til prosjektområdet.";
$strings["remove_user_project_site"] = "Brukertillatelse er fjernet.";
$strings["add_project_site_success"] = "Tillegg er nå på plass på prosjektområdet.";
$strings["remove_project_site_success"] = "Det er nå fjernet fra prosjektområdet.";
$strings["add_file_success"] = "1 opplenket innholdselement.";
$strings["delete_file_success"] = "Opplenking er fjernet.";
$strings["update_comment_file"] = "Filkommentaren er nå oppdatert.";
$strings["session_false"] = "Sesjonsfeil";
$strings["logs"] = "Logger";
$strings["logout_time"] = "Automatisk utlogging";
$strings["noti_foot1"] = "Denne meldingen er generert av PhpCollab.";
$strings["noti_foot2"] = "Se din PhpCollab hjemmeside her:";
$strings["noti_taskassignment1"] = "Ny oppgave:";
$strings["noti_taskassignment2"] = "Du er tildelt en oppgave:";
$strings["noti_moreinfo"] = "For mer informasjon, se:";
$strings["noti_prioritytaskchange1"] = "Oppgaveprioritering endret:";
$strings["noti_prioritytaskchange2"] = "Prioritering av følgende oppgave er endret:";
$strings["noti_statustaskchange1"] = "Oppgavestatus endret:";
$strings["noti_statustaskchange2"] = "Status på følgende oppgave er endret:";
$strings["login_username"] = "Du må oppgi et brukernavn.";
$strings["login_password"] = "Vennligst oppgi et passord.";
$strings["login_clientuser"] = "Dette er en konto for kundebruker. Du har ikke anledning til å bruke PhpCollab med konto for kundebruker.";
$strings["user_already_exists"] = "Det eksisterer allerede en bruker med dette navnet. Vennligst velg en variasjon av brukernavnet.";
$strings["noti_duedatetaskchange1"] = "Frist for oppgaven er endret:";
$strings["noti_duedatetaskchange2"] = "Frist for følgende oppgave er endret:";
$strings["company"] = "Selskap";
$strings["show_all"] = "Vis alle";
$strings["information"] = "Informasjon";
$strings["delete_message"] = "Slett denne meldingen";
$strings["project_team"] = "Prosjektteam";
$strings["document_list"] = "Dokumentliste";
$strings["bulletin_board"] = "Oppslagstavle";
$strings["bulletin_board_topic"] = "Emne på oppslagstavle";
$strings["create_topic"] = "Opprette nytt emne";
$strings["topic_form"] = "Skjema for emne";
$strings["enter_message"] = "Skriv inn din melding";
$strings["upload_file"] = "Last opp fil";
$strings["upload_form"] = "Last opp skjema";
$strings["upload"] = "Last opp";
$strings["document"] = "Dokument";
$strings["approval_comments"] = "Kommentarer";
$strings["client_tasks"] = "Kundeoppgaver";
$strings["team_tasks"] = "Teamoppgaver";
$strings["team_member_details"] = "Opplysninger om deltaker i prosjektteam";
$strings["client_task_details"] = "Opplysninger om kundeoppgave";
$strings["team_task_details"] = "Opplysninger om teamoppgave";
$strings["language"] = "Språk";
$strings["welcome"] = "Velkommen";
$strings["your_projectsite"] = "til din prosjektsite";
$strings["contact_projectsite"] = "Har du spørsmål angående ekstranettet eller informasjonen du finner her, kan du kontakte prosjektleder";
$strings["company_details"] = "Opplysninger om selskapet";
$strings["database"] = "Sikkerhetskopier og oppdater database";
$strings["company_info"] = "Endre opplysninger om selskapet";
$strings["create_projectsite"] = "Opprette prosjektsite";
$strings["projectsite_url"] = "URL for prosjektsite";
$strings["design_template"] = "Lage mal";
$strings["preview_design_template"] = "Forhåndsvisning av maloppsett";
$strings["delete_projectsite"] = "Slette prosjektsite";
$strings["add_file"] = "Legge til fil";
$strings["linked_content"] = "Opplenket innhold";
$strings["edit_file"] = "Oppdatere filopplysninger";
$strings["permitted_client"] = "Kundebrukere med rettigheter";
$strings["grant_client"] = "Gi rettigheter til visning av prosjektsite";
$strings["add_client_user"] = "Legge til kundebruker";
$strings["edit_client_user"] = "Oppdatere kundebruker";
$strings["client_user"] = "Kundebruker";
$strings["client_change_status"] = "Endre din status nedenfor når du har fullført denne oppgaven";
$strings["project_status"] = "Prosjektstatus";
$strings["view_projectsite"] = "Forhåndsvisning av prosjektsite";
$strings["enter_login"] = "Oppgi brukernavn for å motta passord"; //"new password"
$strings["no_login"] = "Logg inn ble ikke funnet i databasen";
$strings["email_pwd"] = "Passord er sendt";
$strings["no_email"] = "Bruker uten e-post";
$strings["forgot_pwd"] = "Glemt passordet?";
$strings["project_owner"] = "Du kan kun foreta endringer på egne prosjekter.";
$strings["connected"] = "Oppkoblet";
$strings["last_visit"] = "Siste besøk";
$strings["compteur"] = "Teller";
$strings["task_owner"] = "Du er ikke ett team medlem for dette prosjektet";
$strings["export"] = "Eksporter";
$strings["reassignment_clientuser"] = "Omgjort Oppgave Tildeling";
$strings["organization_already_exists"] = "Det navnet er alerede i systemet. Vennligst velg ett annet.";
$strings["blank_organization_field"] = "Du må skrive klientens organisasjons navn.";
$strings["blank_fields"] = "Påkrevd felt";
$strings["projectsite_login_fails"] = "Vi kan ikke bekrefte brukernavn og passord kombinasjon.";
$strings["start_date"] = "Start dato";
$strings["completion"] = "Ferdigstillelse";
$strings["update_available"] = "En oppdatering er tilgjengelig!";
$strings["version_current"] = "Du bruker for øyblikket version";
$strings["version_latest"] = "Den siste versionen er";
$strings["sourceforge_link"] = "Se prosjekt side på Sourceforge";
$strings["demo_mode"] = "Demo mode. Aksjon ikke tillatt.";
$strings["setup_erase"] = "Slett filen setup.php!!";
$strings["no_file"] = "Ingen fil valgt";
$strings["exceed_size"] = "Overgår maksimum fil størrelse";
$strings["no_php"] = "Php fil ikke tillatt";
$strings["approval_date"] = "Godkjennelse dato";
$strings["approver"] = "Godkjenner";
$strings["error_database"] = "Kan ikke koble til database";
$strings["error_server"] = "Kan ikke koble til server";
$strings["version_control"] = "Versions Kontrol";
$strings["vc_last_in"] = "Dato sist modifisert";
$strings["ifa_comments"] = "Godkjennelse kommentarer";
$strings["ifa_command"] = "Endrings godkjennelse status";
$strings["ifc_revisions"] = "Peer Kommentarer";
$strings["ifc_revision_of"] = "Gjennomgang av version";
$strings["ifc_add_revision"] = "Legg til Peer kommentar";
$strings["ifc_update_file"] = "Oppdater fil";
$strings["ifc_last_date"] = "Dato sist modifisert";
$strings["ifc_version_history"] = "Versions Historie";
$strings["ifc_delete_file"] = "Slett fil og alle tilknyttede versioner og kommentarer";
$strings["ifc_delete_version"] = "Slett valgt version";
$strings["ifc_delete_review"] = "Slett valgt kommentar";
$strings["ifc_no_revisions"] = "Det er for øyeblikket ingen revision av dette dokumentet";
$strings["unlink_files"] = "Unlink Fileer";
$strings["remove_team"] = "Fjern Team medlemmer";
$strings["remove_team_info"] = "Fjern disse brukerene fra prosjekt teamet?";
$strings["remove_team_client"] = "Fjern Tilgang til å se prosjekt siden";
$strings["note"] = "Notat";
$strings["notes"] = "Notater";
$strings["subject"] = "Emne";
$strings["delete_note"] = "Slett Notat innlegg";
$strings["add_note"] = "Legg til notat innlegg";
$strings["edit_note"] = "Editer Notat innlegg";
$strings["version_increm"] = "Velg versions endring som skal gjelde:";
$strings["url_dev"] = "Utviklings webside url";
$strings["url_prod"] = "Ferdig webside url";
$strings["note_owner"] = "Du kan bare endre dine egne notat.";
$strings["alpha_only"] = "Alpha-nummerisk bare for innlogging";
$strings["edit_notifications"] = "Editer E-mail Notifikasjon";
$strings["edit_notifications_info"] = "Velg for hva du ønsker å motta E-mail notifikasjon.";
$strings["select_deselect"] = "Velg/Ikke velg alt";
$strings["noti_addprojectteam1"] = "Lagt til prosjekt teamet :";
$strings["noti_addprojectteam2"] = "Du er lagt til prosjekt teamet for :";
$strings["noti_removeprojectteam1"] = "Fjernet fra prosjekt teamet :";
$strings["noti_removeprojectteam2"] = "Du er fjernet fra prosjekt teamet for :";
$strings["noti_newpost1"] = "Ny postering :";
$strings["noti_newpost2"] = "En ny postering er lagt til for følgende diskusjon :";
$strings["edit_noti_taskassignment"] = "Jeg er lagt til en ny oppgave.";
$strings["edit_noti_statustaskchange"] = "Status for en av mine oppgave endringer.";
$strings["edit_noti_prioritytaskchange"] = "Prioritet for en av mine oppgave endringer.";
$strings["edit_noti_duedatetaskchange"] = "Forfalls dato for en av mine oppgave endringer.";
$strings["edit_noti_addprojectteam"] = "Jeg er lagt til ett prosjekt team.";
$strings["edit_noti_removeprojectteam"] = "Jeg er fjernet fra ett prosjekt team.";
$strings["edit_noti_newpost"] = "En ny postering er laget for en diskusjon.";
$strings["add_optional"] = "Legg til en valgfri";
$strings["assignment_comment_info"] = "Legg til kommentarer om jobben for denne oppgaven";
$strings["my_notes"] = "Mine notat";
$strings["edit_settings"] = "Editer settings";
$strings["max_upload"] = "Max fil størrelse";
$strings["project_folder_size"] = "Prosjekt folder størrelse";
$strings["calendar"] = "Kalendar";
$strings["date_start"] = "Start dato";
$strings["date_end"] = "Slutt dato";
$strings["time_start"] = "Start tid";
$strings["time_end"] = "Slutt tid";
$strings["calendar_reminder"] = "Påminnelse";
$strings["shortname"] = "Kort navn";
$strings["calendar_recurring"] = "Hendelsen repeteres hver uke på denne dagen";
$strings["edit_database"] = "Editer database";
$strings["noti_newtopic1"] = "Ny disksjon :";
$strings["noti_newtopic2"] = "En ny diskusjon er blitt lagt til følgende prosjekt :";
$strings["edit_noti_newtopic"] = "Et nytt diskusjons emne er opprettet.";
$strings["today"] = "Idag";
$strings["previous"] = "Tidligere";
$strings["next"] = "Neste";
$strings["help"] = "Hjelp";
$strings["complete_date"] = "Fulført dato";
$strings["scope_creep"] = "Leverangse omfang utvidet";
$strings["days"] = "Dager";
$strings["remember_password"] = "Husk Passord";
$strings["client_add_task_note"] = "Note: Oppgaven er registrert i databasen, men vil bare vises om tildelt ett tema medlem!";
$strings["noti_clientaddtask1"] = "Oppgave lagt inn av Klient :";
$strings["noti_clientaddtask2"] = "En ny oppgave er lagt til fra prosjektsiden til følgende prosjekt :";
$strings["phase"] = "Fase";
$strings["phases"] = "Faser";
$strings["phase_id"] = "Fase ID";
$strings["current_phase"] = "Aktive phase(r)";
$strings["total_tasks"] = "Oppgaver Totalt";
$strings["uncomplete_tasks"] = "Ukomplette Oppgaver";
$strings["no_current_phase"] = "Ingen fase er for øyeblikket aktiv";
$strings["true"] = "Riktig";
$strings["false"] = "Feil";
$strings["enable_phases"] = "Aktiver Faser";
$strings["phase_enabled"] = "Faser Aktivert";
$strings["order"] = "Orden";
$strings["options"] = "Valg";
$strings["support_request"] = "Support Henvendelse";
$strings["support_requests"] = "Support Henvendelser";
$strings["support_id"] = "Henvendelse ID";
$strings["my_support_request"] = "Mine Support Henvendelser";
$strings["introduction"] = "Introduksjon";
$strings["submit"] = "Send";
$strings["date_open"] = "Dato Åpnet";
$strings["date_close"] = "Dato Lukket";
$strings["add_support_request"] = "Legg til Support Henvendelse";
$strings["add_support_response"] = "Legg til Support Svar";
$strings["respond"] = "Svar";
$strings["delete_support_request"] = "Support Henvendelse slettet";
$strings["delete_request"] = "Slett support henvendelse";
$strings["delete_support_post"] = "Slett support postering";
$strings["new_requests"] = "Ny Henvendelse";
$strings["open_requests"] = "Åpne Henvendelser";
$strings["closed_requests"] = "Avsluttede Henvendelser";
$strings["manage_new_requests"] = "Manage nye henvendelser";
$strings["manage_open_requests"] = "Manage åpne henvendelser";
$strings["manage_closed_requests"] = "Manage lukkede henvendelser";
$strings["responses"] = "Svar";
$strings["edit_status"] = "Editer Status";
$strings["noti_support_request_new2"] = "Du har sendt en sopprt henvendelse om: ";
$strings["noti_support_post2"] = "Ett nytt svar er lagt inn for din support henvendelse. Vennligst se igjennom detaljene under.";
$strings["noti_support_status2"] = "Din support henvendelse er oppdatert. Vennligst se igjennom detaljene under.";
$strings["noti_support_team_new2"] = "En ny support henvendelse er lagt til prosjekt: ";


//2.0
$strings["delete_subtasks"] = "Slett sub-oppgaver";
$strings["add_subtask"] = "Legg til sub-oppgaver";
$strings["edit_subtask"] = "Editer sub-oppgaver";
$strings["subtask"] = "Sub-oppgave";
$strings["subtasks"] = "Sub-oppgaver";
$strings["show_details"] = "Vis detaljer";
$strings["updates_task"] = "Oppgave oppdaterings historie";
$strings["updates_subtask"] = "Sub-oppgave oppdaterings historie";
//2.1
$strings["go_projects_site"] = "Gå til prosjekt webside";
$strings["bookmark"] = "Bokmerke";
$strings["bookmarks"] = "Bokmerker";
$strings["bookmark_category"] = "Kategori";
$strings["bookmark_category_new"] = "Ny kategori";
$strings["bookmarks_all"] = "Alle";
$strings["bookmarks_my"] = "Mine Bokmerker";
$strings["my"] = "Min";
$strings["bookmarks_private"] = "Privat";
$strings["shared"] = "Delt";
$strings["private"] = "Privat";
$strings["add_bookmark"] = "Legg inn bokmerke";
$strings["edit_bookmark"] = "Editer bokmerke";
$strings["delete_bookmarks"] = "Slett bokmerker";
$strings["team_subtask_details"] = "Team Sub-oppgave Detaljer";
$strings["client_subtask_details"] = "Klient Sub-oppgave Detaljer";
$strings["client_change_status_subtask"] = "Endre din status under når du har fullført denne sub-oppgaven";
$strings["disabled_permissions"] = "Stopp konto";
$strings["user_timezone"] = "Tidssone (GMT)";
//2.2
$strings["project_manager_administrator_permissions"] = "Prosjektleder Administrator";
//2.3
$strings["report"] = "Rapport";
$strings["license"] = "Lisense";
//2.4
$strings["settings_notwritable"] = "Settings.php filen er skrivebeskyttet";
//2.5b4
$strings["Total_Hours_Worked"] = "Arbeids Timer Totalt";
$strings["Pct_Complete"] = "Prosent Ferdig";
