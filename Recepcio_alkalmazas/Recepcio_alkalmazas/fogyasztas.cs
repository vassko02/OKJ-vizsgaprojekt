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
		private Dictionary<string, double> _cons;
		public Dictionary<string, double> cons
		{
			get { return _cons; }
			set { _cons = value; }
		}
		public fogyasztas()
		{

		}
		public fogyasztas(string guestname,string itemname,double price)
		{
			this.guestname = guestname;
			this.cons = new Dictionary<string, double>();
			cons.Add(itemname,price);
		}
	}
}
