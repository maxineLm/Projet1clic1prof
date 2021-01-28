/* recherche de prof en fonction des cours que l'on a eu avec eux
   recherche de prof selon la matière et le niveau
   
   renvoyer les éléments d'un utilisateur élève à partir d'une adresse email
*/



$$
create function verify_user (
	varchar email,
	varchar password)
returns tinyint;
begin
declare ret tinyint unsigned;
declare res integer;
select usr_id into res from wp_users where user_mail = email and user_password = password;
if not res then
	set ret = 0;
else
	set ret = 1;
end if;
	return (ret);
end $$;

$$
create function search_teacher_byfieldandlevel (
	varchar matiere,
	varchar niveau)
returns varchar, varchar;
begin
declare ret varchar, varchar;
declare prof_id integer;
select professeur_id
select usr_nom, usr_prénom into ret from utilisateur natural join (select professeur_id from professeur natura); 
end $$;


$$
create function search_teacher_byname (
	varchar nom)
returns varchar, varchar;
begin
declare ret varchar, varchar;
select usr_nom, usr_prénom into ret from professeur natural join utilisateur where usr_nom = nom or usr_prenom = nom; 
end $$;

$$
create function search_teacher_bycompletename (
	varchar nom,
	varchar prenom)
returns varchar, varchar;
begin
declare ret varchar, varchar;
select usr_nom, usr_prénom into ret from professeur natural join utilisateur where usr_nom = nom and usr_prenom = prenom; 
end $$;
	