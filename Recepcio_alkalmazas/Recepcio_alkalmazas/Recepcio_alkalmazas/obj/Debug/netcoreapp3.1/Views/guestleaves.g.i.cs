﻿#pragma checksum "..\..\..\..\Views\guestleaves.xaml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "B0CEDAAC1A64D1701C77E15259F32527FCC8991B"
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
using Recepcio_alkalmazas.pages;
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


namespace Recepcio_alkalmazas.pages {
    
    
    /// <summary>
    /// guestleaves
    /// </summary>
    public partial class guestleaves : System.Windows.Controls.Page, System.Windows.Markup.IComponentConnector {
        
        
        #line 19 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox tb_guestinput;
        
        #line default
        #line hidden
        
        
        #line 21 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.DataGrid dg_nevek;
        
        #line default
        #line hidden
        
        
        #line 37 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.DataGrid dg_fogyasztas;
        
        #line default
        #line hidden
        
        
        #line 50 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_remove;
        
        #line default
        #line hidden
        
        
        #line 64 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Label lbl_vegosszeg;
        
        #line default
        #line hidden
        
        
        #line 67 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Primitives.ToggleButton btn_keszpenz;
        
        #line default
        #line hidden
        
        
        #line 74 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Primitives.ToggleButton btn_kartya;
        
        #line default
        #line hidden
        
        
        #line 86 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox tb_fizetett;
        
        #line default
        #line hidden
        
        
        #line 91 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock tb_change;
        
        #line default
        #line hidden
        
        
        #line 93 "..\..\..\..\Views\guestleaves.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_fizetes;
        
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
            System.Uri resourceLocater = new System.Uri("/Recepcio_alkalmazas;component/views/guestleaves.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\..\Views\guestleaves.xaml"
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
            this.tb_guestinput = ((System.Windows.Controls.TextBox)(target));
            
            #line 20 "..\..\..\..\Views\guestleaves.xaml"
            this.tb_guestinput.TextChanged += new System.Windows.Controls.TextChangedEventHandler(this.tb_guestinput_TextChanged);
            
            #line default
            #line hidden
            return;
            case 2:
            this.dg_nevek = ((System.Windows.Controls.DataGrid)(target));
            
            #line 22 "..\..\..\..\Views\guestleaves.xaml"
            this.dg_nevek.SelectionChanged += new System.Windows.Controls.SelectionChangedEventHandler(this.dg_nevek_SelectionChanged);
            
            #line default
            #line hidden
            return;
            case 3:
            this.dg_fogyasztas = ((System.Windows.Controls.DataGrid)(target));
            return;
            case 4:
            this.btn_remove = ((System.Windows.Controls.Button)(target));
            
            #line 50 "..\..\..\..\Views\guestleaves.xaml"
            this.btn_remove.Click += new System.Windows.RoutedEventHandler(this.btn_remove_Click);
            
            #line default
            #line hidden
            return;
            case 5:
            this.lbl_vegosszeg = ((System.Windows.Controls.Label)(target));
            return;
            case 6:
            this.btn_keszpenz = ((System.Windows.Controls.Primitives.ToggleButton)(target));
            
            #line 67 "..\..\..\..\Views\guestleaves.xaml"
            this.btn_keszpenz.Click += new System.Windows.RoutedEventHandler(this.btn_keszpenz_Click);
            
            #line default
            #line hidden
            return;
            case 7:
            this.btn_kartya = ((System.Windows.Controls.Primitives.ToggleButton)(target));
            
            #line 74 "..\..\..\..\Views\guestleaves.xaml"
            this.btn_kartya.Click += new System.Windows.RoutedEventHandler(this.btn_kartya_Click);
            
            #line default
            #line hidden
            return;
            case 8:
            this.tb_fizetett = ((System.Windows.Controls.TextBox)(target));
            
            #line 85 "..\..\..\..\Views\guestleaves.xaml"
            this.tb_fizetett.PreviewTextInput += new System.Windows.Input.TextCompositionEventHandler(this.tb_fizetett_PreviewTextInput);
            
            #line default
            #line hidden
            
            #line 87 "..\..\..\..\Views\guestleaves.xaml"
            this.tb_fizetett.TextChanged += new System.Windows.Controls.TextChangedEventHandler(this.tb_fizetett_TextChanged);
            
            #line default
            #line hidden
            return;
            case 9:
            this.tb_change = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 10:
            this.btn_fizetes = ((System.Windows.Controls.Button)(target));
            
            #line 93 "..\..\..\..\Views\guestleaves.xaml"
            this.btn_fizetes.Click += new System.Windows.RoutedEventHandler(this.btn_fizetes_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

