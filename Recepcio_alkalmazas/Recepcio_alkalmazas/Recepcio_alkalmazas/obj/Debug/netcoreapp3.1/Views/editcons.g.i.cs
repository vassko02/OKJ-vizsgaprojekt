﻿#pragma checksum "..\..\..\..\Views\editcons.xaml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "9F2A358C6C1395BF89AE34AFB49243ABAB2D6930"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.42000
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using MahApps.Metro.IconPacks;
using MahApps.Metro.IconPacks.Converter;
using Recepcio_alkalmazas.Views;
using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Controls.Ribbon;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Shell;


namespace Recepcio_alkalmazas.Views {
    
    
    /// <summary>
    /// editcons
    /// </summary>
    public partial class editcons : System.Windows.Window, System.Windows.Markup.IComponentConnector {
        
        
        #line 22 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ComboBox cb_types;
        
        #line default
        #line hidden
        
        
        #line 24 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ComboBox cb_items;
        
        #line default
        #line hidden
        
        
        #line 26 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.StackPanel sp_data;
        
        #line default
        #line hidden
        
        
        #line 29 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox tb_name;
        
        #line default
        #line hidden
        
        
        #line 33 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox tb_price;
        
        #line default
        #line hidden
        
        
        #line 38 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ComboBox cb_tipusok;
        
        #line default
        #line hidden
        
        
        #line 41 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_save;
        
        #line default
        #line hidden
        
        
        #line 53 "..\..\..\..\Views\editcons.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_cancel;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "5.0.10.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/Recepcio_alkalmazas;component/views/editcons.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\..\Views\editcons.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "5.0.10.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            
            #line 9 "..\..\..\..\Views\editcons.xaml"
            ((System.Windows.Controls.Grid)(target)).MouseDown += new System.Windows.Input.MouseButtonEventHandler(this.Grid_MouseDown);
            
            #line default
            #line hidden
            return;
            case 2:
            this.cb_types = ((System.Windows.Controls.ComboBox)(target));
            
            #line 22 "..\..\..\..\Views\editcons.xaml"
            this.cb_types.SelectionChanged += new System.Windows.Controls.SelectionChangedEventHandler(this.cb_types_SelectionChanged);
            
            #line default
            #line hidden
            return;
            case 3:
            this.cb_items = ((System.Windows.Controls.ComboBox)(target));
            
            #line 24 "..\..\..\..\Views\editcons.xaml"
            this.cb_items.SelectionChanged += new System.Windows.Controls.SelectionChangedEventHandler(this.cb_items_SelectionChanged);
            
            #line default
            #line hidden
            return;
            case 4:
            this.sp_data = ((System.Windows.Controls.StackPanel)(target));
            return;
            case 5:
            this.tb_name = ((System.Windows.Controls.TextBox)(target));
            return;
            case 6:
            this.tb_price = ((System.Windows.Controls.TextBox)(target));
            
            #line 33 "..\..\..\..\Views\editcons.xaml"
            this.tb_price.PreviewTextInput += new System.Windows.Input.TextCompositionEventHandler(this.tb_price_PreviewTextInput);
            
            #line default
            #line hidden
            return;
            case 7:
            this.cb_tipusok = ((System.Windows.Controls.ComboBox)(target));
            return;
            case 8:
            this.btn_save = ((System.Windows.Controls.Button)(target));
            
            #line 42 "..\..\..\..\Views\editcons.xaml"
            this.btn_save.Click += new System.Windows.RoutedEventHandler(this.btn_save_Click);
            
            #line default
            #line hidden
            return;
            case 9:
            this.btn_cancel = ((System.Windows.Controls.Button)(target));
            
            #line 54 "..\..\..\..\Views\editcons.xaml"
            this.btn_cancel.Click += new System.Windows.RoutedEventHandler(this.btn_cancel_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

