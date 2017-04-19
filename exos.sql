create procedure CA_Annuel
@an int
as
select SUM(qte*prixHT) as CA_Annuel
from Produit p
join Ligne_Commande lc on p.id = lc.idProduit
join Commande c on lc.idCommande = c.id
where YEAR(dateCmd) = @an;

exec CA_Annuel 2017;





create procedure AfficheFacture
@id_cde int
as
begin
	if not exists (select * from Commande where id = @id_cde)
	begin
		raiserror ('Erreur : Numéro de facture inexistant !',2,0)
	end
	else
	begin
		declare @id smallint, @dateCmd date, @etat varchar(50)
		select @id=id, @dateCmd=dateCmd, @etat=etat from Commande where id = @id_cde
		
		declare CursFacture cursor for select libelle,qte,prixHT,(qte*prixHT) as totalHT from Produit p join Ligne_Commande lc on p.id=lc.idProduit join Commande c on lc.idCommande=c.id where c.id = @id_cde
		
		declare @libelle varchar(50), @qte int, @prixHT float, @totalHT float, @montantTotal decimal(10,2)
		
		open CursFacture
		fetch from CursFacture into @libelle, @qte, @prixHT, @totalHT
		set @montantTotal=0
		
			print 'Commande n° : ' + convert(varchar,@id) + '      Date : ' + convert(varchar,@dateCmd)
			print 'Etat : ' + @etat
			print '----------------------------------------------------------------------'
			while(@@FETCH_STATUS=0)
				begin
					set @montantTotal += @totalHT
					print @libelle + '   ' + convert(varchar,@qte) + '   ' + convert(varchar,@prixHT) + '   ' + convert(varchar,@totalHT)
					fetch next from CursFacture into @libelle, @qte, @prixHT, @totalHT
				end
			print '----------------------------------------------------------------------'
			
		
		close CursFacture
		deallocate CursFacture
		print 'TOTAL HT : ' + convert(varchar,@montantTotal)
		print 'TOTAL TVA : ' + convert(varchar,@montantTotal*0.2)
		print 'TOTAL TTC : ' + convert(varchar,@montantTotal*1.2)
	end
end

exec AfficheFacture 2;


create procedure PrevoirApprovisionnement
@num_produit int
as
begin
    if not exists (select * from Produit where id = @num_produit)
    begin
            raiserror ('Erreur : Produit inexistant !',2,0)
    end
    else
    begin
        declare @num_ordre smallint, @max_trouve smallint
        if exists (select @max_trouve=MAX(id) from A_Commander where idProduit = @num_produit)
        begin
            @num_ordre = @max_trouve + 1
        end
        else
        begin
            @num_ordre = 1
        end
        insert into A_Commander(id,idProduit,dateInsertion,commandePassee) values(@num_ordre,@num_produit,CONVERT(date, CURRENT_TIMESTAMP),0)
    end
end

