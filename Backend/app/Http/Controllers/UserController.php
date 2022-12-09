<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\dominos_pizza;
use App\Models\lapinos_pizza;
use App\Models\ovenstory_pizza;
use App\Models\pizzahut_pizza;

use App\Models\dominos_offer;
use App\Models\lapinos_offer;
use App\Models\ovenstory_offer;
use App\Models\pizzahut_offer;

use Response;

class UserController extends Controller
{
    function getDominosPizzas()
		{
			return dominos_pizza::all();
		}

	function searchProduct($id=null)
		{
            $data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_name LIKE '%$id%'");
			$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_name LIKE '%$id%'");
			$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_name LIKE '%$id%'");
			$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_name LIKE '%$id%'");

			if(!$data1 && !$data2 && !$data3 && !$data4)
			{
				return "Result not found";
			}
			else
			{
				return [$data1,$data2,$data3,$data4];
			}
		}

	function getPizzahutPizzas()
		{
			return pizzahut_pizza::all();
		}
	

	function getLapinosPizzas()
		{
			return lapinos_pizza::all();
		}
	function getOvenstoryPizzas()
		{
			return ovenstory_pizza::all();
		}

	function searchProductLess100($id=null)
		{
			if($id==null)
			{

				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price<100");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price<100");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price<100");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price<100");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
			else{
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price<100 && product_name LIKE '%$id%' ");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price<100 && product_name LIKE '%$id%'");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price<100 && product_name LIKE '%$id%'");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price<100 && product_name LIKE '%$id%'");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
		}

		function searchProduct100To300($id=null)
		{
			if($id==null)
			{
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price>100 && product_price<300");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price>100 && product_price<300");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price>100 && product_price<300");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price>100 && product_price<300");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
			else{
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price>100 && product_price<300 && product_name LIKE '%$id%'");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price>100 && product_price<300 && product_name LIKE '%$id%'");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price>100 && product_price<300 && product_name LIKE '%$id%'");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price>100 && product_price<300 && product_name LIKE '%$id%'");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
		}

		function searchProduct300To500($id=null)
		{
			if($id==null)
			{
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price>300 && product_price<500");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price>300 && product_price<500");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price>300 && product_price<500");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price>300 && product_price<500");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
			else{
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price>300 && product_price<500 && product_name LIKE '%$id%' ");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price>300 && product_price<500 && product_name LIKE '%$id%' ");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price>300 && product_price<500 && product_name LIKE '%$id%' ");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price>300 && product_price<500 && product_name LIKE '%$id%' ");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
		}
	function searchProductOver1000($id=null)
		{
			if($id==null)
			{
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price>1000");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price>1000");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price>1000");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price>1000");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
			else{
			
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where product_price>1000 && product_name LIKE '%$id%'");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where product_price>1000 && product_name LIKE '%$id%'");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where product_price>1000 && product_name LIKE '%$id%'");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where product_price>1000 && product_name LIKE '%$id%'");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
		}

	function searchProductveg($id=null)
		{
			if($id==null)
			{
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where types='veg'");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where types='veg'");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where types='veg'");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where types='veg'");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
			else{
			
				$data1 = DB::select("SELECT * FROM webscraping.dominos_pizzas where types='veg' && product_name LIKE '%$id%'");
				$data2 = DB::select("SELECT * FROM webscraping.pizzahut_pizzas where types='veg' && product_name LIKE '%$id%'");
				$data3 = DB::select("SELECT * FROM webscraping.ovenstory_pizzas where types='veg' && product_name LIKE '%$id%'");
				$data4 = DB::select("SELECT * FROM webscraping.lapinos_pizzas where types='veg' && product_name LIKE '%$id%'");

				if(!$data1 && !$data2 && !$data3 && !$data4)
				{
					return "Result not found";
				}
				else
				{
					return [$data1,$data2,$data3,$data4];
				}
			}
		}


	function getDominosPizzasOffers()
		{
			return dominos_offer::all();
		}
	function getPizzahutPizzasOffers()
		{
			return pizzahut_offer::all();
		}
	function getOvenstoryPizzasOffers()
		{
			return ovenstory_offer::all();
		}
	function getLapinosPizzasOffers()
		{
			return lapinos_offer::all();
		}
}
