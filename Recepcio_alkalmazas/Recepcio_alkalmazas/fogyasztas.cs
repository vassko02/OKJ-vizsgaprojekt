using System;
using System.Collections.Generic;
using System.Text;

namespace Recepcio_alkalmazas
{
	class fogyasztas
	{
		private string _guestname;

		public string guestname
		{
			get { return _guestname; }
			set { _guestname = value; }
		}
		private string  _itemname;

		public string  itemname
		{
			get { return _itemname; }
			set { _itemname = value; }
		}
		private double _price;

		public double price
		{
			get { return _price; }
			set { _price = value; }
		}

		public fogyasztas()
		{

		}
		public fogyasztas(string guestname,string itemname,double price)
		{
			this.guestname = guestname;
			this.itemname = itemname;
			this.price = price;
		}
	}
}
