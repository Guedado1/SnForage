{{-- @extends('layout.default')
@section('content')<br><br><br><br><br><br><br>  --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple invoice html template</title>
</head>
<body> 

<style>
	@import "https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700";html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,total,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{height:840px;width:592px;margin:auto;font-family:'Open Sans',sans-serif;font-size:12px}strong{font-weight:700}#container{position:relative;padding:4%}#header{height:80px}#header > #reference{float:right;text-align:right}#header > #reference h3{margin:0}#header > #reference h4{margin:0;font-size:85%;font-weight:600}#header > #reference p{margin:0;margin-top:2%;font-size:85%}#header > #logo{width:50%;float:left}#fromto{height:160px}#fromto > #from,#fromto > #to{width:45%;min-height:90px;margin-top:30px;font-size:85%;padding:1.5%;line-height:120%}#fromto > #from{float:left;width:45%;background:#efefef;margin-top:30px;font-size:85%;padding:1.5%}#fromto > #to{float:right;border:solid grey 1px}#items{margin-top:10px}#items > p{font-weight:700;text-align:right;margin-bottom:1%;font-size:65%}#items > table{width:100%;font-size:85%;border:solid grey 1px}#items > table th:first-child{text-align:left}#items > table th{font-weight:400;padding:5px 4px}#items > table td{padding:3px 4px}#items > table th:nth-child(2),#items > table th:nth-child(4){width:80px}#items > table th:nth-child(3){width:80px}#items > table th:nth-child(5){width:70px}#items > table tr td:not(:first-child){text-align:right;padding-right:3%}#items table td{border-right:solid grey 1px}#items table tr td{padding-top:3px;padding-bottom:3px;height:10px}#items table tr:nth-child(1){border:solid grey 1px}#items table tr th{border-right:solid grey 1px;padding:3px}#items table tr:nth-child(2) > td{padding-top:8px}#summary{height:170px;margin-top:30px}#summary #note{float:left}#summary #note h4{font-size:10px;font-weight:600;font-style:italic;margin-bottom:4px}#summary #note p{font-size:10px;font-style:italic}#summary #total table{font-size:85%;width:260px;float:right}#summary #total table td{padding:3px 4px}#summary #total table tr td:last-child{text-align:right}#summary #total table tr:nth-child(3){background:#efefef;font-weight:600}#footer{margin:auto;position:absolute;left:4%;bottom:4%;right:4%;border-top:solid grey 1px}#footer p{margin-top:1%;font-size:65%;line-height:140%;text-align:center}
</style>


<div id="container">
	<div id="header">
		<div id="logo">
            {{-- <h2>SENFORAGE</h2> --}}
			 <img src="{{asset('assets/./img/logos.jpg')}}" alt=""> 
		</div>
		<div id="reference">
			<h3><strong>Facture</strong></h3>
			<h4>Réf. : FA1703-00001</h4>
			<p>Date facturation : 20/07/2019</p>
		</div>
	</div>
	<div id="fromto">
		<div id="from">
			<p>
				<strong>SENFORAGE</strong><br>
				Avenue Cheikh Anta Diop<br>
				75000 Dakar <br><br>
				Tél.: 33 851 98 01 <br>
				Email: senforage@senforage.com <br>
				Web: www.senforage.com
			</p>
		</div>
		<div id="to">
			<p>
				<strong>{{$facture->user->name}} {{$facture->user->firstname}}</strong><br>
				{{$facture->user->client->village->nom}}<br>
                {{$facture->user->email}}<br>
                {{$facture->consommations->first()->compteur->numero_serie}}
			</p>
		</div>
	</div>

	<div id="items">
		<h2>Montants exprimés en Fcfa</h2>
		<table>
			<tr>
                
                <th>ID</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
				<th>TVA</th>
				<th>P.U. HT</th>
                <th>Valeur</th>
                <th>Type</th>
                <th>Total HT</th>
                
            </tr>
            @foreach ($facture->consommations as $consommation)
            <tr>
                    <td> {{$consommation->id}}</td>
                    <td>{{$facture->debut_consommation}}</td>
                    <td>{{$facture->fin_consommation}}</td>
                    <td>18%</td>
                    <td> 50f</td>
                    <td>{{$consommation->valeur}}</td>
                    <td>{{$facture->reglement->type->name}}</td>
                    <td>3,99</td>
                    
                </tr>
        
    @endforeach
			<tr>
				<td> </td>
				<td></td>
				<td></td>
				<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
			</tr>
			{{-- <tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
            </tr>
            <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                    {{-- </tr> --}}
		</table>
	</div>

	<div id="summary">
		<div id="note">
			<h4>Note :</h4>
			<p>Information complémentaire à ajouter.</p>
		</div>
		<div id="total">
			<table border="1">
				<tr>
					<td>Total HT</td>
					<td>3,99</td>
				</tr>
				<tr>
					<td>Total TVA 18%</td>
					<td>0,80</td>
				</tr>
				<tr>
					<td>Total TTC</td>
					<td>4,79</td>
				</tr>
			</table>
		</div>
	</div>

	<div id="footer">
		<p>Société à responsabilité limité (SARL) - Capital de 1 000 000 € - SIRET: 87564738493127 <br>
			NAF-APE: 6202A - Num. TVA: FR28987856541</p>
	</div>
</div>

</body>
</html>
 {{-- @endsection  --}}
