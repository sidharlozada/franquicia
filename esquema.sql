-- DROP SCHEMA "system";

CREATE SCHEMA "system" AUTHORIZATION desarrollo;

-- DROP SEQUENCE "system".ad_bank_ad_bank_id_seq;

CREATE SEQUENCE "system".ad_bank_ad_bank_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_birthdate_ad_birthdate_id_seq;

CREATE SEQUENCE "system".ad_birthdate_ad_birthdate_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_city_ad_city_id_seq;

CREATE SEQUENCE "system".ad_city_ad_city_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_client_ad_client_id_seq;

CREATE SEQUENCE "system".ad_client_ad_client_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_company_ad_company_id_seq;

CREATE SEQUENCE "system".ad_company_ad_company_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_concept_ad_concept_id_seq;

CREATE SEQUENCE "system".ad_concept_ad_concept_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_concept_loans_ad_concept_loans_id_seq;

CREATE SEQUENCE "system".ad_concept_loans_ad_concept_loans_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_concept_type_ad_concept_type_id_seq;

CREATE SEQUENCE "system".ad_concept_type_ad_concept_type_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_confirmation_ad_confirmation_id_seq;

CREATE SEQUENCE "system".ad_confirmation_ad_confirmation_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_constant_ad_constant_id_seq;

CREATE SEQUENCE "system".ad_constant_ad_constant_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_country_ad_country_id_seq;

CREATE SEQUENCE "system".ad_country_ad_country_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_credit_days_provider_ad_credit_days_provider_id_seq;

CREATE SEQUENCE "system".ad_credit_days_provider_ad_credit_days_provider_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_departament_ad_departament_id_seq;

CREATE SEQUENCE "system".ad_departament_ad_departament_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_employee_ad_employee_id_seq;

CREATE SEQUENCE "system".ad_employee_ad_employee_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_holidays_ad_holidays_id_seq;

CREATE SEQUENCE "system".ad_holidays_ad_holidays_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_inventory_mov_ad_inventory_mov_seq;

CREATE SEQUENCE "system".ad_inventory_mov_ad_inventory_mov_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_loans_ad_loans_id_seq;

CREATE SEQUENCE "system".ad_loans_ad_loans_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_loans_history_ad_loans_history_id_seq;

CREATE SEQUENCE "system".ad_loans_history_ad_loans_history_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_modules_ad_modules_id_seq;

CREATE SEQUENCE "system".ad_modules_ad_modules_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_month_ad_month_id_seq;

CREATE SEQUENCE "system".ad_month_ad_month_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_notification_user_ad_notification_id_seq;

CREATE SEQUENCE "system".ad_notification_user_ad_notification_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_notifications_ad_notifications_id_seq;

CREATE SEQUENCE "system".ad_notifications_ad_notifications_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_operations_ad_ope_id_seq;

CREATE SEQUENCE "system".ad_operations_ad_ope_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_org_ad_org_id_seq;

CREATE SEQUENCE "system".ad_org_ad_org_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_pay_per_box_ad_pay_per_box_status_id_seq;

CREATE SEQUENCE "system".ad_pay_per_box_ad_pay_per_box_status_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_pay_per_box_relation_ad_pay_per_box_relation_id_seq;

CREATE SEQUENCE "system".ad_pay_per_box_relation_ad_pay_per_box_relation_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_pay_per_box_status_ad_pay_per_box_status_id_seq;

CREATE SEQUENCE "system".ad_pay_per_box_status_ad_pay_per_box_status_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_ad_payroll_id_seq;

CREATE SEQUENCE "system".ad_payroll_ad_payroll_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_calc_conc_ad_payroll_calc_conc_id_seq;

CREATE SEQUENCE "system".ad_payroll_calc_conc_ad_payroll_calc_conc_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_calculated_ad_payroll_calculated_id_seq;

CREATE SEQUENCE "system".ad_payroll_calculated_ad_payroll_calculated_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_concept_history_ad_payroll_concept_history_id_seq;

CREATE SEQUENCE "system".ad_payroll_concept_history_ad_payroll_concept_history_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_employee_ad_payroll_employee_id_seq;

CREATE SEQUENCE "system".ad_payroll_employee_ad_payroll_employee_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_history_ad_payroll_history_id_seq;

CREATE SEQUENCE "system".ad_payroll_history_ad_payroll_history_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_history_employee_ad_payroll_history_employee_id_seq;

CREATE SEQUENCE "system".ad_payroll_history_employee_ad_payroll_history_employee_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_payroll_history_var_ad_payroll_history_var_id_seq;

CREATE SEQUENCE "system".ad_payroll_history_var_ad_payroll_history_var_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_position_ad_position_id_seq;

CREATE SEQUENCE "system".ad_position_ad_position_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_profiles_ad_profiles_id_seq;

CREATE SEQUENCE "system".ad_profiles_ad_profiles_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system"."ad_provider type_ad_provider_type_id_seq";

CREATE SEQUENCE "system"."ad_provider type_ad_provider_type_id_seq"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_provider_ad_provider_id_seq;

CREATE SEQUENCE "system".ad_provider_ad_provider_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_rate_show_ad_rate_show_id_seq;

CREATE SEQUENCE "system".ad_rate_show_ad_rate_show_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_rate_show_type_ad_rate_show_id_seq;

CREATE SEQUENCE "system".ad_rate_show_type_ad_rate_show_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_relation_pay_conc_ad_relation_pay_conc_id_seq;

CREATE SEQUENCE "system".ad_relation_pay_conc_ad_relation_pay_conc_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_relation_var_employee_ad_relation_var_employee_id_seq;

CREATE SEQUENCE "system".ad_relation_var_employee_ad_relation_var_employee_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_safe_box_ad_safe_box_id_seq;

CREATE SEQUENCE "system".ad_safe_box_ad_safe_box_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_savings_bank_ad_savings_bank_id_seq;

CREATE SEQUENCE "system".ad_savings_bank_ad_savings_bank_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_savings_bank_det_ad_savings_bank_det_id_seq;

CREATE SEQUENCE "system".ad_savings_bank_det_ad_savings_bank_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_savings_bank_retirement_ad_savings_bank_retirement_id_seq;

CREATE SEQUENCE "system".ad_savings_bank_retirement_ad_savings_bank_retirement_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_sex_ad_sex_id_seq;

CREATE SEQUENCE "system".ad_sex_ad_sex_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_state_ad_state_id_seq;

CREATE SEQUENCE "system".ad_state_ad_state_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_type_nomina_ad_type_nomina_id_seq;

CREATE SEQUENCE "system".ad_type_nomina_ad_type_nomina_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_user_ad_user_id_seq;

CREATE SEQUENCE "system".ad_user_ad_user_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_vacation_ad_vacation_id_seq;

CREATE SEQUENCE "system".ad_vacation_ad_vacation_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_variables_ad_variables_id_seq;

CREATE SEQUENCE "system".ad_variables_ad_variables_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".ad_wholesale_ad_wholesale_id_seq;

CREATE SEQUENCE "system".ad_wholesale_ad_wholesale_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".as_activity_as_activity_id_seq;

CREATE SEQUENCE "system".as_activity_as_activity_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".as_departament_as_departament_id_seq;

CREATE SEQUENCE "system".as_departament_as_departament_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".as_justify_op_as_justify_op_id_seq;

CREATE SEQUENCE "system".as_justify_op_as_justify_op_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".as_workstation_as_workstation_id_seq;

CREATE SEQUENCE "system".as_workstation_as_workstation_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".c_currency_c_currency_id_seq;

CREATE SEQUENCE "system".c_currency_c_currency_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".c_location_c_location_id_seq;

CREATE SEQUENCE "system".c_location_c_location_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".c_uom_c_uom_id_seq;

CREATE SEQUENCE "system".c_uom_c_uom_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".charge_charge_id_seq;

CREATE SEQUENCE "system".charge_charge_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".charge_det_charge_det_id_seq;

CREATE SEQUENCE "system".charge_det_charge_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".charge_invoice_charge_invoice_id_seq;

CREATE SEQUENCE "system".charge_invoice_charge_invoice_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".credit_note_credit_note_id_seq;

CREATE SEQUENCE "system".credit_note_credit_note_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".credit_note_det_credit_note_det_id_seq;

CREATE SEQUENCE "system".credit_note_det_credit_note_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".customers_customers_id_seq;

CREATE SEQUENCE "system".customers_customers_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".customers_type_customers_type_id_seq;

CREATE SEQUENCE "system".customers_type_customers_type_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".daily_closing_daily_closing_id_seq;

CREATE SEQUENCE "system".daily_closing_daily_closing_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".daily_closing_det_daily_closing_det_id_seq;

CREATE SEQUENCE "system".daily_closing_det_daily_closing_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".delivery_note_delivery_note_id_seq;

CREATE SEQUENCE "system".delivery_note_delivery_note_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".delivery_note_det_delivery_note_det_id_seq;

CREATE SEQUENCE "system".delivery_note_det_delivery_note_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".discount_percent_discount_percent_id_seq;

CREATE SEQUENCE "system".discount_percent_discount_percent_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".expenses_concept_expenses_concept_id_seq;

CREATE SEQUENCE "system".expenses_concept_expenses_concept_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".expenses_expenses_id_seq;

CREATE SEQUENCE "system".expenses_expenses_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".fs_oil_changes_fs_oil_changes_id_seq;

CREATE SEQUENCE "system".fs_oil_changes_fs_oil_changes_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".fs_service_agent_fs_service_agent_id_seq;

CREATE SEQUENCE "system".fs_service_agent_fs_service_agent_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".fs_vehicle_brand_fs_vehicle_brand_id_seq;

CREATE SEQUENCE "system".fs_vehicle_brand_fs_vehicle_brand_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".fs_vehicle_liters_fs_vehicle_liters_id_seq;

CREATE SEQUENCE "system".fs_vehicle_liters_fs_vehicle_liters_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".fs_vehicle_model_fs_vehicle_model_id_seq;

CREATE SEQUENCE "system".fs_vehicle_model_fs_vehicle_model_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".fs_vehicle_motor_fs_vehicle_motor_id_seq;

CREATE SEQUENCE "system".fs_vehicle_motor_fs_vehicle_motor_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".gb_payment_condition_gb_payment_condition_id_seq;

CREATE SEQUENCE "system".gb_payment_condition_gb_payment_condition_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".gb_status_gb_status_id_seq;

CREATE SEQUENCE "system".gb_status_gb_status_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".gb_tracing_order_gb_tracing_id_seq;

CREATE SEQUENCE "system".gb_tracing_order_gb_tracing_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".gs_answer_gs_answer_id_seq;

CREATE SEQUENCE "system".gs_answer_gs_answer_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".gs_company_gs_company_id_seq;

CREATE SEQUENCE "system".gs_company_gs_company_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".gs_social_gs_social_id_seq;

CREATE SEQUENCE "system".gs_social_gs_social_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".import_quote_det_import_quote_det_id_seq;

CREATE SEQUENCE "system".import_quote_det_import_quote_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".import_quote_import_quote_id_seq;

CREATE SEQUENCE "system".import_quote_import_quote_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".interest_rate_interest_rate_id_seq;

CREATE SEQUENCE "system".interest_rate_interest_rate_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".inventory_adjustment_det_inventory_adjustment_det_id_seq;

CREATE SEQUENCE "system".inventory_adjustment_det_inventory_adjustment_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".inventory_adjustment_inventory_adjustment_id_seq;

CREATE SEQUENCE "system".inventory_adjustment_inventory_adjustment_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".inventory_load_det_inventory_load_det_id_seq;

CREATE SEQUENCE "system".inventory_load_det_inventory_load_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".inventory_load_inventory_load_id_seq;

CREATE SEQUENCE "system".inventory_load_inventory_load_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".invoice_det_invoice_det_id_seq;

CREATE SEQUENCE "system".invoice_det_invoice_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".invoice_invoice_id_seq;

CREATE SEQUENCE "system".invoice_invoice_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_inventory_mov_det_m_inventory_mov_det_id_seq;

CREATE SEQUENCE "system".m_inventory_mov_det_m_inventory_mov_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_product_category_m_product_category_id_seq;

CREATE SEQUENCE "system".m_product_category_m_product_category_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_product_cost_price_m_product_cost_price_id_seq;

CREATE SEQUENCE "system".m_product_cost_price_m_product_cost_price_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_product_history_cost_price_m_product_history_cost_price_seq;

CREATE SEQUENCE "system".m_product_history_cost_price_m_product_history_cost_price_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_product_m_product_id_seq;

CREATE SEQUENCE "system".m_product_m_product_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_product_stock_m_product_stock_id_seq;

CREATE SEQUENCE "system".m_product_stock_m_product_stock_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_product_type_m_product_type_id_seq;

CREATE SEQUENCE "system".m_product_type_m_product_type_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".m_warehouse_m_warehouse_id_seq;

CREATE SEQUENCE "system".m_warehouse_m_warehouse_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".monitoring_container_control_monitoring_container_control_i_seq;

CREATE SEQUENCE "system".monitoring_container_control_monitoring_container_control_i_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".movie_tv_format_movie_tv_format_id_seq;

CREATE SEQUENCE "system".movie_tv_format_movie_tv_format_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".movie_tv_movie_tv_id_seq;

CREATE SEQUENCE "system".movie_tv_movie_tv_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".nom_status_nom_status_id_seq;

CREATE SEQUENCE "system".nom_status_nom_status_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".orders_det_orders_det_id_seq;

CREATE SEQUENCE "system".orders_det_orders_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".orders_orders_id_seq;

CREATE SEQUENCE "system".orders_orders_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".pay_per_box_ad_pay_per_box_id_seq;

CREATE SEQUENCE "system".pay_per_box_ad_pay_per_box_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".payment_condition_payment_condition_id_seq;

CREATE SEQUENCE "system".payment_condition_payment_condition_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".payment_type_payment_type_id_seq;

CREATE SEQUENCE "system".payment_type_payment_type_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".prepare_vacation_ad_prepare_vacation_id_seq;

CREATE SEQUENCE "system".prepare_vacation_ad_prepare_vacation_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system"."purchase requisition_purchase_requisition_id_seq";

CREATE SEQUENCE "system"."purchase requisition_purchase_requisition_id_seq"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".purchase_order_det_invoice_det_id_seq;

CREATE SEQUENCE "system".purchase_order_det_invoice_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".purchase_order_invoice_id_seq;

CREATE SEQUENCE "system".purchase_order_invoice_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".quotation_cont_det_quotation_cont_det_id_seq;

CREATE SEQUENCE "system".quotation_cont_det_quotation_cont_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".quotation_cont_quotation_cont_id_seq;

CREATE SEQUENCE "system".quotation_cont_quotation_cont_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".quotation_det_quotation_det_id_seq;

CREATE SEQUENCE "system".quotation_det_quotation_det_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".quotation_quotation_id_seq;

CREATE SEQUENCE "system".quotation_quotation_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".rate_rate_id_seq;

CREATE SEQUENCE "system".rate_rate_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".relation_us_op_ad_relation_id_seq;

CREATE SEQUENCE "system".relation_us_op_ad_relation_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".status_container_status_container_id_seq;

CREATE SEQUENCE "system".status_container_status_container_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".status_status_id_seq;

CREATE SEQUENCE "system".status_status_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".sys_category_sys_category_id_seq;

CREATE SEQUENCE "system".sys_category_sys_category_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".sys_status_sys_status_id_seq;

CREATE SEQUENCE "system".sys_status_sys_status_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".sys_ticket_ti_sys_ticket_ti_id_seq;

CREATE SEQUENCE "system".sys_ticket_ti_sys_ticket_ti_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".tax_tax_id_seq;

CREATE SEQUENCE "system".tax_tax_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE "system".update_history_m_product_update_history_m_product_id_seq;

CREATE SEQUENCE "system".update_history_m_product_update_history_m_product_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;-- "system".ad_bank definition

-- Drop table

-- DROP TABLE "system".ad_bank;

CREATE TABLE "system".ad_bank (
	ad_bank_id serial NOT NULL,
	bank varchar(150) NULL,
	account_number varchar NULL
);


-- "system".ad_birthdate definition

-- Drop table

-- DROP TABLE "system".ad_birthdate;

CREATE TABLE "system".ad_birthdate (
	ad_birthdate_id serial NOT NULL,
	ad_org_id int4 NULL,
	created timestamp NOT NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	isactive varchar(1) NOT NULL,
	ad_employee_id int4 NOT NULL,
	picture varchar(100) NULL,
	picture_birthdate varchar(100) NULL,
	CONSTRAINT ad_birthdate_pk PRIMARY KEY (ad_birthdate_id),
	CONSTRAINT ad_birthdate_un UNIQUE (ad_employee_id)
);


-- "system".ad_client definition

-- Drop table

-- DROP TABLE "system".ad_client;

CREATE TABLE "system".ad_client (
	ad_client_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	value varchar(40) NOT NULL,
	"name" varchar(60) NOT NULL,
	description text NOT NULL,
	mm_policy numeric(10) NOT NULL,
	CONSTRAINT pky_ad_client_id PRIMARY KEY (ad_client_id)
);


-- "system".ad_company definition

-- Drop table

-- DROP TABLE "system".ad_company;

CREATE TABLE "system".ad_company (
	ad_company_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar(100) NOT NULL,
	rif varchar(25) NOT NULL,
	description varchar(250) NULL,
	picture varchar NULL
);


-- "system".ad_concept definition

-- Drop table

-- DROP TABLE "system".ad_concept;

CREATE TABLE "system".ad_concept (
	ad_concept_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar(50) NULL,
	description varchar(200) NULL,
	default_days int4 NULL,
	formulate varchar NULL,
	ad_concept_type_id int4 NULL,
	formulate_cant varchar NULL,
	CONSTRAINT ad_concept_pk PRIMARY KEY (ad_concept_id)
);


-- "system".ad_concept_loans definition

-- Drop table

-- DROP TABLE "system".ad_concept_loans;

CREATE TABLE "system".ad_concept_loans (
	ad_concept_loans_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL,
	description varchar NULL,
	ad_payroll_type_id int4 NULL,
	CONSTRAINT ad_concept_loans_pk PRIMARY KEY (ad_concept_loans_id)
);


-- "system".ad_concept_type definition

-- Drop table

-- DROP TABLE "system".ad_concept_type;

CREATE TABLE "system".ad_concept_type (
	ad_concept_type_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp NULL,
	createdby int4 NOT NULL,
	updated timestamp NULL,
	updatedby int4 NOT NULL,
	description varchar NULL,
	symbol varchar(1) NULL,
	CONSTRAINT pky_ad_concept_type_id PRIMARY KEY (ad_concept_type_id)
);


-- "system".ad_confirmation definition

-- Drop table

-- DROP TABLE "system".ad_confirmation;

CREATE TABLE "system".ad_confirmation (
	ad_confirmation_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL
);


-- "system".ad_constant definition

-- Drop table

-- DROP TABLE "system".ad_constant;

CREATE TABLE "system".ad_constant (
	ad_constant_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp NULL,
	createdby int4 NOT NULL,
	updated timestamp NULL,
	updatedby int4 NOT NULL,
	description varchar(50) NULL,
	value varchar NULL,
	CONSTRAINT ad_constant_pk PRIMARY KEY (ad_constant_id)
);


-- "system".ad_country definition

-- Drop table

-- DROP TABLE "system".ad_country;

CREATE TABLE "system".ad_country (
	ad_country_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar(100) NOT NULL,
	simbol varchar(2) NOT NULL,
	CONSTRAINT pky_ad_country_id PRIMARY KEY (ad_country_id)
);


-- "system".ad_credit_days_provider definition

-- Drop table

-- DROP TABLE "system".ad_credit_days_provider;

CREATE TABLE "system".ad_credit_days_provider (
	ad_credit_days_provider_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	days varchar NULL
);


-- "system".ad_departament definition

-- Drop table

-- DROP TABLE "system".ad_departament;

CREATE TABLE "system".ad_departament (
	ad_departament_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar(100) NOT NULL,
	description varchar(250) NULL,
	ad_company_id int4 NOT NULL,
	CONSTRAINT ad_departament_pk PRIMARY KEY (ad_departament_id)
);


-- "system".ad_employee definition

-- Drop table

-- DROP TABLE "system".ad_employee;

CREATE TABLE "system".ad_employee (
	ad_employee_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_company_id int4 NOT NULL,
	ad_departament_id int4 NOT NULL,
	ad_position_id int4 NOT NULL,
	"name" varchar(100) NULL,
	name2 varchar(100) NULL,
	customer_initial_id int4 NULL,
	identification varchar(15) NULL,
	rif varchar(15) NULL,
	birthdate date NULL,
	ad_sex_id int4 NULL,
	telephone varchar(30) NULL,
	email varchar(50) NULL,
	address varchar(200) NULL,
	datein date NULL,
	ad_bank_id int4 NULL,
	bank_account varchar(50) NULL,
	ad_payroll_id int4 NULL,
	salary varchar NULL,
	as_workstation_id int4 NULL,
	isboss varchar(1) NULL,
	dateout date NULL,
	dateretry date NULL,
	nom_status_id int4 NULL,
	social_benefits numeric(20,2) NULL DEFAULT 0,
	CONSTRAINT ad_employee_pk PRIMARY KEY (ad_employee_id)
);


-- "system".ad_holidays definition

-- Drop table

-- DROP TABLE "system".ad_holidays;

CREATE TABLE "system".ad_holidays (
	ad_holidays_id serial NOT NULL,
	date_start date NULL,
	CONSTRAINT ad_holidays_pk PRIMARY KEY (ad_holidays_id)
);


-- "system".ad_interest_rate definition

-- Drop table

-- DROP TABLE "system".ad_interest_rate;

CREATE TABLE "system".ad_interest_rate (
	ad_interest_rate_id int4 NOT NULL DEFAULT nextval('system.interest_rate_interest_rate_id_seq'::regclass),
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	amount numeric(20,2) NULL,
	CONSTRAINT interest_rate_pk PRIMARY KEY (ad_interest_rate_id)
);


-- "system".ad_loans definition

-- Drop table

-- DROP TABLE "system".ad_loans;

CREATE TABLE "system".ad_loans (
	ad_loans_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_employee_id int4 NULL,
	ad_concept_loans_id int4 NULL,
	date_start date NULL,
	total numeric NULL,
	loans_numbers numeric NULL,
	c_currency_id int4 NULL
);


-- "system".ad_loans_history definition

-- Drop table

-- DROP TABLE "system".ad_loans_history;

CREATE TABLE "system".ad_loans_history (
	ad_loans_history_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_loans_id int4 NULL,
	debit numeric NULL,
	date_debit date NULL,
	debit_numbers numeric NULL,
	ad_payroll_history_id int4 NULL,
	CONSTRAINT ad_loans_history_pk PRIMARY KEY (ad_loans_history_id),
	CONSTRAINT ad_loans_history_un UNIQUE (ad_payroll_history_id, ad_loans_id)
);


-- "system".ad_modules definition

-- Drop table

-- DROP TABLE "system".ad_modules;

CREATE TABLE "system".ad_modules (
	ad_modules_id serial NOT NULL,
	"name" varchar NULL,
	status varchar NULL,
	orden int4 NULL,
	icon varchar NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL
);
CREATE INDEX ad_modules_ad_modules_id_idx ON system.ad_modules USING btree (ad_modules_id);


-- "system".ad_month definition

-- Drop table

-- DROP TABLE "system".ad_month;

CREATE TABLE "system".ad_month (
	ad_month_id serial NOT NULL,
	num varchar NULL,
	description varchar NULL,
	CONSTRAINT ad_month_pk PRIMARY KEY (ad_month_id)
);


-- "system".ad_notification_user definition

-- Drop table

-- DROP TABLE "system".ad_notification_user;

CREATE TABLE "system".ad_notification_user (
	ad_notification_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	ad_user_id int4 NULL,
	description varchar NULL,
	clicked varchar(1) NULL,
	date_visible date NULL
);


-- "system".ad_operations definition

-- Drop table

-- DROP TABLE "system".ad_operations;

CREATE TABLE "system".ad_operations (
	ad_operations_id int4 NOT NULL DEFAULT nextval('system.ad_operations_ad_ope_id_seq'::regclass),
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	description varchar NULL,
	page varchar NULL,
	ad_modules_id int4 NULL,
	tipo varchar(1) NULL,
	orden int4 NULL,
	id_padre int4 NULL,
	nivel int4 NULL,
	CONSTRAINT pky_ad_ope_id PRIMARY KEY (ad_operations_id)
);


-- "system".ad_org definition

-- Drop table

-- DROP TABLE "system".ad_org;

CREATE TABLE "system".ad_org (
	ad_org_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	value varchar(40) NOT NULL,
	"name" varchar(60) NOT NULL,
	address varchar(200) NOT NULL,
	rif varchar(12) NULL,
	telephone varchar(15) NULL,
	dedicate_to varchar NULL,
	slogan varchar NULL,
	web_page varchar NULL,
	CONSTRAINT pky_ad_org_id PRIMARY KEY (ad_org_id)
);


-- "system".ad_pay_per_box definition

-- Drop table

-- DROP TABLE "system".ad_pay_per_box;

CREATE TABLE "system".ad_pay_per_box (
	ad_pay_per_box_id int4 NOT NULL DEFAULT nextval('system.pay_per_box_ad_pay_per_box_id_seq'::regclass),
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	ad_safe_box_id int4 NOT NULL,
	customers_id int4 NOT NULL,
	payment_type_id int4 NOT NULL,
	date_pay date NULL,
	description varchar NULL,
	status_id int4 NOT NULL,
	total numeric(20,2) NOT NULL,
	ad_org_id int4 NOT NULL,
	nrodoc varchar(15) NULL,
	reference_id int4 NULL,
	rate_id numeric(10) NULL,
	CONSTRAINT ad_pay_per_box_pk PRIMARY KEY (ad_pay_per_box_id)
);


-- "system".ad_pay_per_box_relation definition

-- Drop table

-- DROP TABLE "system".ad_pay_per_box_relation;

CREATE TABLE "system".ad_pay_per_box_relation (
	ad_pay_per_box_relation_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar NULL,
	document_type varchar NULL
);


-- "system".ad_pay_per_box_status definition

-- Drop table

-- DROP TABLE "system".ad_pay_per_box_status;

CREATE TABLE "system".ad_pay_per_box_status (
	ad_pay_per_box_status_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar NULL
);


-- "system".ad_payroll definition

-- Drop table

-- DROP TABLE "system".ad_payroll;

CREATE TABLE "system".ad_payroll (
	ad_payroll_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_company_id int4 NOT NULL,
	ad_payroll_type_id int4 NULL,
	date_start date NULL,
	date_end date NULL,
	description varchar NULL,
	vacation int4 NULL DEFAULT 0,
	CONSTRAINT ad_payroll_pk PRIMARY KEY (ad_payroll_id)
);


-- "system".ad_payroll_calculated definition

-- Drop table

-- DROP TABLE "system".ad_payroll_calculated;

CREATE TABLE "system".ad_payroll_calculated (
	ad_payroll_calculated_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NULL,
	createdby int4 NOT NULL,
	ad_payroll_id int4 NOT NULL,
	date_start date NOT NULL,
	date_end date NOT NULL,
	description varchar NULL,
	vacation int4 NULL DEFAULT 0,
	CONSTRAINT pky_ad_payroll_calculated_id PRIMARY KEY (ad_payroll_calculated_id)
);


-- "system".ad_payroll_history definition

-- Drop table

-- DROP TABLE "system".ad_payroll_history;

CREATE TABLE "system".ad_payroll_history (
	ad_payroll_history_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NULL,
	createdby int4 NOT NULL,
	ad_payroll_id int4 NOT NULL,
	date_start date NOT NULL,
	date_end date NOT NULL,
	description varchar NULL,
	vacation int4 NULL DEFAULT 0,
	CONSTRAINT pky_ad_payroll_history_id PRIMARY KEY (ad_payroll_history_id)
);


-- "system".ad_payroll_type definition

-- Drop table

-- DROP TABLE "system".ad_payroll_type;

CREATE TABLE "system".ad_payroll_type (
	ad_payroll_type_id int4 NOT NULL DEFAULT nextval('system.ad_type_nomina_ad_type_nomina_id_seq'::regclass),
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	"name" varchar(100) NULL,
	date_start date NULL,
	day_range int4 NULL
);


-- "system".ad_position definition

-- Drop table

-- DROP TABLE "system".ad_position;

CREATE TABLE "system".ad_position (
	ad_position_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar(100) NOT NULL,
	description varchar(250) NULL,
	ad_company_id int4 NOT NULL,
	ad_departament_id int4 NOT NULL
);


-- "system".ad_profiles definition

-- Drop table

-- DROP TABLE "system".ad_profiles;

CREATE TABLE "system".ad_profiles (
	ad_profiles_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".ad_provider definition

-- Drop table

-- DROP TABLE "system".ad_provider;

CREATE TABLE "system".ad_provider (
	ad_provider_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	customer_id int4 NULL,
	ad_provider_type_id int4 NULL,
	contact_person varchar NULL,
	email_contact varchar NULL,
	telephone_contact varchar NULL,
	address varchar NULL,
	ad_credit_days_provider_id int4 NULL,
	credit_limit numeric NULL,
	"percent" numeric NULL,
	coment varchar NULL
);


-- "system".ad_provider_type definition

-- Drop table

-- DROP TABLE "system".ad_provider_type;

CREATE TABLE "system".ad_provider_type (
	ad_provider_type_id int4 NOT NULL DEFAULT nextval('system."ad_provider type_ad_provider_type_id_seq"'::regclass),
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".ad_rate_show definition

-- Drop table

-- DROP TABLE "system".ad_rate_show;

CREATE TABLE "system".ad_rate_show (
	ad_rate_show_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	mount numeric(20,2) NOT NULL DEFAULT 0.00,
	date_start date NULL,
	ad_rate_show_type_id int4 NOT NULL
);


-- "system".ad_rate_show_type definition

-- Drop table

-- DROP TABLE "system".ad_rate_show_type;

CREATE TABLE "system".ad_rate_show_type (
	ad_rate_show_type_id int4 NOT NULL DEFAULT nextval('system.ad_rate_show_type_ad_rate_show_id_seq'::regclass),
	ad_org_id int4 NULL,
	ad_company_id int4 NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	"name" varchar(100) NULL
);


-- "system".ad_relation_pay_conc definition

-- Drop table

-- DROP TABLE "system".ad_relation_pay_conc;

CREATE TABLE "system".ad_relation_pay_conc (
	ad_relation_pay_conc_id serial NOT NULL,
	ad_payroll_id int4 NULL,
	ad_concept_id int4 NULL,
	CONSTRAINT pky_ad_relation_pay_conc_id PRIMARY KEY (ad_relation_pay_conc_id)
);


-- "system".ad_relation_var_employee definition

-- Drop table

-- DROP TABLE "system".ad_relation_var_employee;

CREATE TABLE "system".ad_relation_var_employee (
	ad_relation_var_employee_id serial NOT NULL,
	ad_employee_id int4 NULL,
	ad_variables_id int4 NULL,
	value numeric(20,2) NULL,
	CONSTRAINT pky_ad_relation_var_employee_id PRIMARY KEY (ad_relation_var_employee_id)
);


-- "system".ad_safe_box definition

-- Drop table

-- DROP TABLE "system".ad_safe_box;

CREATE TABLE "system".ad_safe_box (
	ad_safe_box_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar(60) NOT NULL,
	description text NOT NULL,
	as_workstation_id int4 NOT NULL
);


-- "system".ad_sex definition

-- Drop table

-- DROP TABLE "system".ad_sex;

CREATE TABLE "system".ad_sex (
	ad_sex_id serial NOT NULL,
	sex varchar(20) NULL,
	sex_id varchar(1) NULL
);


-- "system".ad_user definition

-- Drop table

-- DROP TABLE "system".ad_user;

CREATE TABLE "system".ad_user (
	ad_user_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	username varchar(60) NOT NULL,
	description varchar(200) NULL,
	"password" varchar(200) NOT NULL,
	email varchar(50) NULL,
	c_bpartner_id int4 NULL,
	firstname varchar(60) NULL,
	lastname varchar(60) NULL,
	m_warehouse_id int4 NULL,
	CONSTRAINT pky_ad_user_id PRIMARY KEY (ad_user_id)
);


-- "system".ad_vacation definition

-- Drop table

-- DROP TABLE "system".ad_vacation;

CREATE TABLE "system".ad_vacation (
	ad_vacation_id serial NOT NULL,
	ad_employee_id int4 NULL,
	date_start_vac date NULL,
	date_end_vac date NULL,
	days_vac int2 NULL,
	pending_days_vac int2 NULL,
	enjoyment bpchar(1) NULL,
	CONSTRAINT ad_vacation_id_pkey PRIMARY KEY (ad_vacation_id)
);


-- "system".ad_vacation_prepare definition

-- Drop table

-- DROP TABLE "system".ad_vacation_prepare;

CREATE TABLE "system".ad_vacation_prepare (
	ad_prepare_vacation_id int4 NOT NULL DEFAULT nextval('system.prepare_vacation_ad_prepare_vacation_id_seq'::regclass),
	ad_employee_id int4 NULL,
	date_start date NULL,
	date_end date NULL,
	days int2 NULL,
	pending_days int2 NULL,
	enjoyment bpchar(1) NULL,
	CONSTRAINT ad_prepare_vacation_id_pkey PRIMARY KEY (ad_prepare_vacation_id)
);


-- "system".ad_variables definition

-- Drop table

-- DROP TABLE "system".ad_variables;

CREATE TABLE "system".ad_variables (
	ad_variables_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar(50) NULL,
	description varchar(200) NULL,
	symbol varchar NULL
);


-- "system".ad_wholesale definition

-- Drop table

-- DROP TABLE "system".ad_wholesale;

CREATE TABLE "system".ad_wholesale (
	ad_wholesale_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_employee_id int4 NOT NULL,
	sell_date date NULL,
	mount numeric(20,2) NOT NULL DEFAULT 0.00,
	status int4 NULL,
	justify varchar(100) NULL
);


-- "system".as_activity definition

-- Drop table

-- DROP TABLE "system".as_activity;

CREATE TABLE "system".as_activity (
	as_activity_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	ad_user_id int4 NULL,
	entry_time time NULL,
	entry_date date NULL,
	acumulate int4 NULL,
	as_workstation_id varchar NULL,
	canceled int4 NULL,
	justify varchar(200) NULL DEFAULT ''::character varying,
	as_justify_op_id int4 NULL,
	CONSTRAINT as_activity_pk PRIMARY KEY (as_activity_id)
);


-- "system".as_departament definition

-- Drop table

-- DROP TABLE "system".as_departament;

CREATE TABLE "system".as_departament (
	as_departament_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_departament_id int4 NULL,
	entry_time time NOT NULL,
	maximum_minutes int4 NOT NULL,
	message varchar(300) NOT NULL,
	CONSTRAINT as_departament_pk PRIMARY KEY (as_departament_id)
);


-- "system".as_justify_op definition

-- Drop table

-- DROP TABLE "system".as_justify_op;

CREATE TABLE "system".as_justify_op (
	as_justify_op_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	"name" varchar(50) NULL
);


-- "system".as_workstation definition

-- Drop table

-- DROP TABLE "system".as_workstation;

CREATE TABLE "system".as_workstation (
	as_workstation_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_company_id int4 NULL,
	"name" varchar(50) NULL,
	CONSTRAINT as_workstation_pk PRIMARY KEY (as_workstation_id)
);


-- "system".c_currency definition

-- Drop table

-- DROP TABLE "system".c_currency;

CREATE TABLE "system".c_currency (
	c_currency_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	iso_code varchar(10) NOT NULL,
	cursymbol varchar(40) NOT NULL,
	description varchar(250) NOT NULL,
	rate numeric(20,2) NULL,
	CONSTRAINT c_currency_pkey PRIMARY KEY (c_currency_id)
);


-- "system".c_uom definition

-- Drop table

-- DROP TABLE "system".c_uom;

CREATE TABLE "system".c_uom (
	c_uom_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar(60) NOT NULL,
	uomsymbol varchar(40) NOT NULL,
	description varchar(250) NOT NULL,
	quantity_liters numeric(20,3) NULL,
	CONSTRAINT pky_c_uom_id PRIMARY KEY (c_uom_id)
);


-- "system".cg_system definition

-- Drop table

-- DROP TABLE "system".cg_system;

CREATE TABLE "system".cg_system (
	current_key varchar NULL,
	license_for varchar NULL,
	max_user numeric NOT NULL,
	start_date date NULL,
	end_date date NULL
);


-- "system".charge definition

-- Drop table

-- DROP TABLE "system".charge;

CREATE TABLE "system".charge (
	charge_id serial NOT NULL,
	invoice_id int4 NULL,
	customers_id int4 NULL,
	created timestamp NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	nrodoc varchar NULL,
	nroref varchar NULL,
	status_id int4 NULL,
	rate_id int4 NULL,
	rate_amount numeric(20,2) NULL,
	start_date timestamp NULL,
	daily_closing_id int4 NULL,
	total_sale numeric(20,2) NULL,
	total_charge numeric(20,2) NULL,
	returned_dollars numeric(20,2) NULL DEFAULT 0,
	returned_bolivars numeric(20,2) NULL DEFAULT 0,
	CONSTRAINT charge_id PRIMARY KEY (charge_id)
);


-- "system".container_control definition

-- Drop table

-- DROP TABLE "system".container_control;

CREATE TABLE "system".container_control (
	container_control_id int4 NOT NULL DEFAULT nextval('system.import_quote_import_quote_id_seq'::regclass),
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL DEFAULT 0,
	iva numeric(20,2) NOT NULL DEFAULT 0,
	total numeric(20,2) NOT NULL DEFAULT 0,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	document_type varchar(10) NULL DEFAULT 'COT'::character varying,
	origen_id int4 NULL,
	destino_id int4 NULL,
	container_reference varchar NULL,
	CONSTRAINT import_quote_pk PRIMARY KEY (container_control_id)
);


-- "system".credit_note definition

-- Drop table

-- DROP TABLE "system".credit_note;

CREATE TABLE "system".credit_note (
	credit_note_id serial NOT NULL,
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL,
	iva numeric(20,2) NOT NULL,
	total numeric(20,2) NOT NULL,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	reference_document varchar NULL,
	reference_id int4 NULL,
	CONSTRAINT credit_note_pk PRIMARY KEY (credit_note_id)
);


-- "system".customers definition

-- Drop table

-- DROP TABLE "system".customers;

CREATE TABLE "system".customers (
	customers_id serial NOT NULL,
	customers_initial_id int4 NULL,
	identification varchar(1024) NULL,
	"name" varchar(1024) NULL,
	lastname varchar(1024) NULL,
	telephone varchar(1024) NULL,
	address varchar(1024) NULL,
	type_p varchar(1024) NULL,
	type_id varchar(1024) NULL,
	created varchar(1024) NULL,
	createdby varchar(1024) NULL,
	updated varchar(1024) NULL,
	updatedby varchar(1024) NULL,
	customers_type_id int4 NULL,
	email varchar NULL,
	CONSTRAINT customers_pk PRIMARY KEY (customers_id),
	CONSTRAINT customers_un UNIQUE (identification)
);


-- "system".customers_initial definition

-- Drop table

-- DROP TABLE "system".customers_initial;

CREATE TABLE "system".customers_initial (
	customers_initial_id int4 NULL,
	"name" varchar(1024) NULL
);


-- "system".customers_type definition

-- Drop table

-- DROP TABLE "system".customers_type;

CREATE TABLE "system".customers_type (
	customers_type_id serial NOT NULL,
	"name" varchar(100) NULL
);


-- "system".daily_closing definition

-- Drop table

-- DROP TABLE "system".daily_closing;

CREATE TABLE "system".daily_closing (
	daily_closing_id serial NOT NULL,
	status_id int4 NULL,
	created timestamp NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	start_date date NULL,
	CONSTRAINT daily_closing_pk PRIMARY KEY (daily_closing_id)
);


-- "system".delivery_note definition

-- Drop table

-- DROP TABLE "system".delivery_note;

CREATE TABLE "system".delivery_note (
	delivery_note_id serial NOT NULL,
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL,
	iva numeric(20,2) NOT NULL,
	total numeric(20,2) NOT NULL,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	document_type varchar NULL,
	reference_document varchar NULL,
	reference_id int4 NULL,
	CONSTRAINT delivery_note_pk PRIMARY KEY (delivery_note_id)
);


-- "system".discount_percent definition

-- Drop table

-- DROP TABLE "system".discount_percent;

CREATE TABLE "system".discount_percent (
	discount_percent_id serial NOT NULL,
	"percent" numeric(20,2) NULL,
	shorten numeric(20,2) NULL,
	description varchar NULL,
	ad_org_id int4 NULL,
	created timestamp NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	isactive varchar(1) NULL,
	CONSTRAINT discount_percent_pk PRIMARY KEY (discount_percent_id)
);


-- "system".expenses definition

-- Drop table

-- DROP TABLE "system".expenses;

CREATE TABLE "system".expenses (
	expenses_id serial NOT NULL,
	ad_org_id int4 NULL,
	created date NULL,
	createdby int4 NULL,
	updated date NULL,
	updatedby int4 NULL,
	c_currency_id int4 NULL,
	m_product_type_id int4 NULL,
	expenses_concept_id int4 NULL,
	amount numeric NULL,
	description varchar(120) NULL,
	ad_safe_box_id int4 NULL,
	payment_type_id int4 NULL,
	customers_id int4 NULL
);


-- "system".expenses_concept definition

-- Drop table

-- DROP TABLE "system".expenses_concept;

CREATE TABLE "system".expenses_concept (
	expenses_concept_id serial NOT NULL,
	"name" varchar(60) NULL
);


-- "system".fs_oil_changes definition

-- Drop table

-- DROP TABLE "system".fs_oil_changes;

CREATE TABLE "system".fs_oil_changes (
	fs_oil_changes_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	fs_vehicle_brand_id int4 NULL,
	fs_vehicle_model_id int4 NULL,
	approximate_mileage numeric NULL,
	oil_filter varchar NULL,
	n_of_liters numeric NULL,
	invoice_number varchar NULL,
	oil varchar NULL,
	delivery_note_number varchar NULL,
	customers_id int4 NULL,
	other_customer varchar NULL,
	telephone varchar NULL,
	fs_service_agent_id int4 NULL,
	hour_service time(0) NULL,
	impact_on_quality varchar NULL,
	impact_on_time varchar NULL,
	date_service date NULL,
	movil_service varchar NULL,
	status int4 NULL,
	car_identification varchar NULL
);


-- "system".fs_service_agent definition

-- Drop table

-- DROP TABLE "system".fs_service_agent;

CREATE TABLE "system".fs_service_agent (
	fs_service_agent_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	ad_employee_id int4 NULL
);


-- "system".fs_vehicle_brand definition

-- Drop table

-- DROP TABLE "system".fs_vehicle_brand;

CREATE TABLE "system".fs_vehicle_brand (
	fs_vehicle_brand_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar NULL
);


-- "system".fs_vehicle_liters definition

-- Drop table

-- DROP TABLE "system".fs_vehicle_liters;

CREATE TABLE "system".fs_vehicle_liters (
	fs_vehicle_liters_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	fs_vehicle_motor_id int4 NULL,
	filters varchar NULL,
	liters numeric NULL,
	thread varchar NULL
);


-- "system".fs_vehicle_model definition

-- Drop table

-- DROP TABLE "system".fs_vehicle_model;

CREATE TABLE "system".fs_vehicle_model (
	fs_vehicle_model_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar NULL,
	fs_vehicle_brand_id int4 NULL
);


-- "system".fs_vehicle_motor definition

-- Drop table

-- DROP TABLE "system".fs_vehicle_motor;

CREATE TABLE "system".fs_vehicle_motor (
	fs_vehicle_motor_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar NULL,
	fs_vehicle_model_id int4 NULL,
	fs_vehicle_brand_id int4 NULL
);


-- "system".gb_payment_condition definition

-- Drop table

-- DROP TABLE "system".gb_payment_condition;

CREATE TABLE "system".gb_payment_condition (
	gb_payment_condition_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".gb_status definition

-- Drop table

-- DROP TABLE "system".gb_status;

CREATE TABLE "system".gb_status (
	gb_status_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	status varchar NULL,
	description varchar NULL
);


-- "system".gb_tracing_order definition

-- Drop table

-- DROP TABLE "system".gb_tracing_order;

CREATE TABLE "system".gb_tracing_order (
	gb_tracing_id serial NOT NULL,
	ad_org_id int4 NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	client varchar NULL,
	payment_condition_id int4 NULL,
	num_order varchar NULL,
	ad_employee_id int4 NULL,
	description varchar NULL,
	quantity numeric NULL,
	amount numeric NULL,
	provider varchar NULL,
	date_of_purchase date NULL,
	tracking varchar NULL,
	status_id int4 NULL,
	estimated_date date NULL,
	arrival_date date NULL,
	in_house varchar NULL,
	ad_company_id int4 NULL,
	tracking_number varchar NULL
);


-- "system".gs_answer definition

-- Drop table

-- DROP TABLE "system".gs_answer;

CREATE TABLE "system".gs_answer (
	gs_answer_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".gs_company definition

-- Drop table

-- DROP TABLE "system".gs_company;

CREATE TABLE "system".gs_company (
	gs_company_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".gs_social definition

-- Drop table

-- DROP TABLE "system".gs_social;

CREATE TABLE "system".gs_social (
	gs_social_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	customer_id int4 NULL,
	gs_company_id int4 NULL,
	date_contact date NULL,
	prox_date_contact date NULL,
	contact_form varchar NULL,
	survey int4 NULL
);


-- "system".inventory_adjustment definition

-- Drop table

-- DROP TABLE "system".inventory_adjustment;

CREATE TABLE "system".inventory_adjustment (
	inventory_adjustment_id serial NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	description varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	total_cost numeric(10,2) NULL,
	rate numeric(20,2) NULL,
	rate_id int4 NULL,
	CONSTRAINT inventory_adjustment_pk PRIMARY KEY (inventory_adjustment_id)
);


-- "system".inventory_load definition

-- Drop table

-- DROP TABLE "system".inventory_load;

CREATE TABLE "system".inventory_load (
	inventory_load_id serial NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	description varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	total_cost numeric(10,2) NULL,
	rate numeric(20,2) NULL,
	rate_id int4 NULL,
	CONSTRAINT inventory_load_pk PRIMARY KEY (inventory_load_id)
);


-- "system".invoice definition

-- Drop table

-- DROP TABLE "system".invoice;

CREATE TABLE "system".invoice (
	invoice_id serial NOT NULL,
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL,
	iva numeric(20,2) NOT NULL,
	total numeric(20,2) NOT NULL,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	reference_document varchar NULL,
	reference_id int4 NULL,
	CONSTRAINT invoice_pk PRIMARY KEY (invoice_id)
);


-- "system".m_inventory_mov definition

-- Drop table

-- DROP TABLE "system".m_inventory_mov;

CREATE TABLE "system".m_inventory_mov (
	m_inventory_mov_id int4 NOT NULL DEFAULT nextval('system.ad_inventory_mov_ad_inventory_mov_seq'::regclass),
	ad_org_id int4 NOT NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	m_warehouse_id_in int4 NULL,
	start_date date NULL,
	description varchar NULL,
	nrodoc varchar NULL,
	status_id int4 NULL,
	CONSTRAINT m_inventory_mov_pk PRIMARY KEY (m_inventory_mov_id)
);


-- "system".m_product definition

-- Drop table

-- DROP TABLE "system".m_product;

CREATE TABLE "system".m_product (
	m_product_id serial NOT NULL,
	cod varchar(10) NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	"name" varchar(250) NOT NULL,
	description varchar(250) NOT NULL,
	serial varchar(250) NOT NULL,
	m_product_category_id int4 NOT NULL,
	c_uom_id int4 NULL,
	m_product_type_id int4 NOT NULL,
	weight float8 NULL,
	CONSTRAINT m_product_cod UNIQUE (cod),
	CONSTRAINT pky_m_product_id PRIMARY KEY (m_product_id)
);


-- "system".m_product_category definition

-- Drop table

-- DROP TABLE "system".m_product_category;

CREATE TABLE "system".m_product_category (
	m_product_category_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL DEFAULT now(),
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL DEFAULT now(),
	updatedby numeric(10) NOT NULL,
	"name" varchar(255) NOT NULL,
	description varchar(255) NULL,
	isactive varchar(1) NULL,
	CONSTRAINT pky_m_product_category_id PRIMARY KEY (m_product_category_id)
);


-- "system".m_product_history_cost_price definition

-- Drop table

-- DROP TABLE "system".m_product_history_cost_price;

CREATE TABLE "system".m_product_history_cost_price (
	m_product_history_cost_price serial NOT NULL,
	inventory_load_id int4 NOT NULL,
	m_product_id int4 NULL,
	start_date date NULL,
	cost_om numeric(20,2) NULL,
	price_om numeric(20,2) NULL,
	utility numeric(20,2) NULL,
	"cost" numeric(20,2) NULL,
	price numeric(20,2) NULL,
	CONSTRAINT m_product_history_cost_price_pk PRIMARY KEY (m_product_history_cost_price)
);


-- "system".m_product_type definition

-- Drop table

-- DROP TABLE "system".m_product_type;

CREATE TABLE "system".m_product_type (
	m_product_type_id serial NOT NULL,
	"name" bpchar NOT NULL DEFAULT 'Y'::bpchar,
	isactive varchar(1) NULL,
	created timestamp NOT NULL,
	createdby int4 NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	ad_org_id int4 NULL,
	CONSTRAINT m_product_type_un UNIQUE (name),
	CONSTRAINT pky_m_product_type_id PRIMARY KEY (m_product_type_id)
);


-- "system".m_warehouse definition

-- Drop table

-- DROP TABLE "system".m_warehouse;

CREATE TABLE "system".m_warehouse (
	m_warehouse_id serial NOT NULL,
	ad_client_id int4 NULL,
	ad_org_id int4 NOT NULL,
	isactive bpchar(1) NOT NULL DEFAULT 'Y'::bpchar,
	created timestamp NOT NULL DEFAULT now(),
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL DEFAULT now(),
	updatedby numeric(10) NOT NULL,
	"name" varchar(60) NOT NULL,
	description varchar(255) NULL,
	c_location_id int4 NOT NULL,
	cod varchar NULL,
	shorten varchar(20) NULL,
	CONSTRAINT pky_m_warehouse_id PRIMARY KEY (m_warehouse_id)
);


-- "system".monitoring_container_control definition

-- Drop table

-- DROP TABLE "system".monitoring_container_control;

CREATE TABLE "system".monitoring_container_control (
	monitoring_container_control_id int4 NOT NULL DEFAULT nextval('system.monitoring_container_control_monitoring_container_control_i_seq'::regclass),
	container_control_id int4 NULL,
	updated date NULL,
	updatedby int4 NULL,
	description_status varchar NULL,
	CONSTRAINT monitoring_container_control_pk PRIMARY KEY (monitoring_container_control_id)
);


-- "system".movie_tv definition

-- Drop table

-- DROP TABLE "system".movie_tv;

CREATE TABLE "system".movie_tv (
	movie_tv_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL,
	format int4 NULL,
	time_in time(0) NULL,
	time_out time(0) NULL,
	filename varchar NULL
);


-- "system".movie_tv_format definition

-- Drop table

-- DROP TABLE "system".movie_tv_format;

CREATE TABLE "system".movie_tv_format (
	movie_tv_format_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL
);


-- "system".nom_status definition

-- Drop table

-- DROP TABLE "system".nom_status;

CREATE TABLE "system".nom_status (
	nom_status_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".orders definition

-- Drop table

-- DROP TABLE "system".orders;

CREATE TABLE "system".orders (
	orders_id serial NOT NULL,
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL,
	iva numeric(20,2) NOT NULL,
	total numeric(20,2) NOT NULL,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	document_type varchar(10) NULL,
	CONSTRAINT orders_pk PRIMARY KEY (orders_id)
);


-- "system".payment_condition definition

-- Drop table

-- DROP TABLE "system".payment_condition;

CREATE TABLE "system".payment_condition (
	payment_condition_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	"name" varchar(60) NOT NULL,
	description varchar(250) NOT NULL,
	"percent" numeric(20,2) NULL,
	movement_type varchar NULL,
	amount numeric(20,2) NULL,
	CONSTRAINT payment_condition_pkey PRIMARY KEY (payment_condition_id)
);


-- "system".purchase_order definition

-- Drop table

-- DROP TABLE "system".purchase_order;

CREATE TABLE "system".purchase_order (
	purchase_order_id int4 NOT NULL DEFAULT nextval('system.purchase_order_invoice_id_seq'::regclass),
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL,
	iva numeric(20,2) NOT NULL,
	total numeric(20,2) NOT NULL,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	reference_document varchar NULL,
	reference_id int4 NULL,
	CONSTRAINT invoice_pk_1 PRIMARY KEY (purchase_order_id)
);


-- "system".purchase_order_det definition

-- Drop table

-- DROP TABLE "system".purchase_order_det;

CREATE TABLE "system".purchase_order_det (
	purchase_order_det_id int4 NOT NULL DEFAULT nextval('system.purchase_order_det_invoice_det_id_seq'::regclass),
	purchase_order_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	price numeric(20,2) NOT NULL,
	discount_percent_id int4 NOT NULL,
	tax_id int4 NOT NULL,
	total numeric(20,2) NOT NULL,
	CONSTRAINT invoice_det_pk_1 PRIMARY KEY (purchase_order_det_id)
);


-- "system".purchase_requisition definition

-- Drop table

-- DROP TABLE "system".purchase_requisition;

CREATE TABLE "system".purchase_requisition (
	purchase_requisition_id int4 NOT NULL DEFAULT nextval('system."purchase requisition_purchase_requisition_id_seq"'::regclass),
	ad_user_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	document_type varchar(10) NULL DEFAULT 'COT'::character varying
);


-- "system".quotation definition

-- Drop table

-- DROP TABLE "system".quotation;

CREATE TABLE "system".quotation (
	quotation_id serial NOT NULL,
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL,
	iva numeric(20,2) NOT NULL,
	total numeric(20,2) NOT NULL,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	document_type varchar(10) NULL DEFAULT 'COT'::character varying,
	CONSTRAINT quotation_pk PRIMARY KEY (quotation_id)
);


-- "system".quotation_cont definition

-- Drop table

-- DROP TABLE "system".quotation_cont;

CREATE TABLE "system".quotation_cont (
	quotation_cont_id serial NOT NULL,
	customers_id int4 NOT NULL,
	nrodoc varchar(15) NOT NULL,
	status_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	start_date timestamp NOT NULL,
	end_date timestamp NOT NULL,
	c_currency_id int4 NOT NULL,
	payment_condition_id int4 NOT NULL,
	rate_id int4 NOT NULL,
	description varchar NOT NULL,
	num_control varchar NOT NULL,
	product_cant int4 NOT NULL,
	art_cant int4 NOT NULL,
	subtotal numeric(20,2) NOT NULL,
	iva numeric(20,2) NOT NULL,
	total numeric(20,2) NOT NULL,
	printed int4 NOT NULL DEFAULT 0,
	rate_id_fact int4 NULL,
	document_type varchar(10) NULL DEFAULT 'COT'::character varying
);


-- "system".quotation_cont_det definition

-- Drop table

-- DROP TABLE "system".quotation_cont_det;

CREATE TABLE "system".quotation_cont_det (
	quotation_cont_det_id serial NOT NULL,
	quotation_cont_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	price numeric(20,2) NOT NULL,
	discount_percent_id int4 NOT NULL,
	tax_id int4 NOT NULL,
	total numeric(20,2) NOT NULL
);


-- "system".rate definition

-- Drop table

-- DROP TABLE "system".rate;

CREATE TABLE "system".rate (
	rate_id serial NOT NULL,
	payment_condition_id int4 NOT NULL,
	monto numeric(20,2) NOT NULL DEFAULT 0.00,
	created timestamp NOT NULL,
	isactive varchar(1) NOT NULL,
	c_currency_id int4 NOT NULL,
	"percent" numeric(20,2) NULL,
	date_start date NULL,
	date_end date NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	ad_org_id int4 NULL,
	CONSTRAINT rate_pkey PRIMARY KEY (rate_id)
);


-- "system".status definition

-- Drop table

-- DROP TABLE "system".status;

CREATE TABLE "system".status (
	status_id serial NOT NULL,
	"name" varchar(250) NULL,
	description varchar(250) NULL,
	CONSTRAINT status_pk PRIMARY KEY (status_id)
);


-- "system".sys_category definition

-- Drop table

-- DROP TABLE "system".sys_category;

CREATE TABLE "system".sys_category (
	sys_category_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".sys_status definition

-- Drop table

-- DROP TABLE "system".sys_status;

CREATE TABLE "system".sys_status (
	sys_status_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	"name" varchar NULL,
	description varchar NULL
);


-- "system".sys_ticket_ti definition

-- Drop table

-- DROP TABLE "system".sys_ticket_ti;

CREATE TABLE "system".sys_ticket_ti (
	sys_ticket_ti_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	sys_category_id int4 NULL,
	description varchar NULL,
	ad_user_id int4 NULL,
	sys_status_id int4 NULL,
	coment varchar NULL,
	agent_id int4 NULL
);


-- "system".tax definition

-- Drop table

-- DROP TABLE "system".tax;

CREATE TABLE "system".tax (
	tax_id serial NOT NULL,
	"percent" numeric(20,2) NULL,
	isactive varchar NULL,
	description varchar NULL,
	"name" varchar NULL,
	ad_org_id int4 NULL,
	created timestamp NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	amount int4 NULL,
	CONSTRAINT tax_pk PRIMARY KEY (tax_id)
);
CREATE INDEX tax_tax_id_idx ON system.tax USING btree (tax_id);


-- "system".update_history_m_product definition

-- Drop table

-- DROP TABLE "system".update_history_m_product;

CREATE TABLE "system".update_history_m_product (
	update_history_m_product_id serial NOT NULL,
	m_product_id int4 NOT NULL,
	cod varchar(10) NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	"name" varchar(250) NULL,
	description varchar(250) NULL,
	serial varchar(250) NULL,
	m_product_category_id int4 NULL,
	c_uom_id int4 NULL,
	m_product_type_id int4 NULL,
	"cost" numeric NULL,
	price numeric NULL,
	utility numeric NULL,
	cost_om numeric NULL,
	price_om numeric NULL,
	CONSTRAINT pky_update_history_m_product_id PRIMARY KEY (update_history_m_product_id)
);


-- "system".ad_payroll_calc_conc definition

-- Drop table

-- DROP TABLE "system".ad_payroll_calc_conc;

CREATE TABLE "system".ad_payroll_calc_conc (
	ad_payroll_calc_conc_id serial NOT NULL,
	ad_payroll_calculated_id int4 NOT NULL,
	ad_employee_id int4 NOT NULL,
	ad_concept_id int4 NOT NULL,
	"assignment" numeric(20,2) NULL,
	deduction numeric(20,2) NULL,
	description varchar NULL,
	quantity varchar NULL,
	CONSTRAINT pky_ad_payroll_calc_conc_id PRIMARY KEY (ad_payroll_calc_conc_id),
	CONSTRAINT ad_payroll_calc_conc_fk FOREIGN KEY (ad_payroll_calculated_id) REFERENCES system.ad_payroll_calculated(ad_payroll_calculated_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".ad_payroll_employee definition

-- Drop table

-- DROP TABLE "system".ad_payroll_employee;

CREATE TABLE "system".ad_payroll_employee (
	ad_payroll_employee_id serial NOT NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	ad_employee_id int4 NOT NULL,
	ad_payroll_id int4 NULL,
	CONSTRAINT ad_payroll_employee_pk PRIMARY KEY (ad_payroll_employee_id),
	CONSTRAINT ad_payroll_employee_un UNIQUE (ad_employee_id, ad_payroll_id),
	CONSTRAINT ad_payroll_employee_fk FOREIGN KEY (ad_employee_id) REFERENCES system.ad_employee(ad_employee_id),
	CONSTRAINT ad_payroll_employee_fk_1 FOREIGN KEY (ad_payroll_id) REFERENCES system.ad_payroll(ad_payroll_id)
);


-- "system".ad_payroll_history_concept definition

-- Drop table

-- DROP TABLE "system".ad_payroll_history_concept;

CREATE TABLE "system".ad_payroll_history_concept (
	ad_payroll_concept_history_id int4 NOT NULL DEFAULT nextval('system.ad_payroll_concept_history_ad_payroll_concept_history_id_seq'::regclass),
	ad_payroll_history_id int4 NOT NULL,
	ad_employee_id int4 NOT NULL,
	ad_concept_id int4 NOT NULL,
	"assignment" numeric(20,2) NULL,
	deduction numeric(20,2) NULL,
	description varchar NULL,
	formulate varchar NULL,
	quantity varchar NULL,
	CONSTRAINT pky_ad_payroll_concept_history_id PRIMARY KEY (ad_payroll_concept_history_id),
	CONSTRAINT ad_payroll_concept_history_fk FOREIGN KEY (ad_payroll_history_id) REFERENCES system.ad_payroll_history(ad_payroll_history_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".ad_payroll_history_employee definition

-- Drop table

-- DROP TABLE "system".ad_payroll_history_employee;

CREATE TABLE "system".ad_payroll_history_employee (
	ad_payroll_history_employee_id serial NOT NULL,
	ad_payroll_history_id int4 NOT NULL,
	ad_employee_id int4 NOT NULL,
	ad_org_id int4 NOT NULL,
	created timestamp NULL,
	createdby int4 NOT NULL,
	ad_company_id int4 NOT NULL,
	ad_departament_id int4 NOT NULL,
	ad_position_id int4 NOT NULL,
	"name" varchar(100) NULL,
	name2 varchar(100) NULL,
	customer_initial_id int4 NULL,
	identification varchar(15) NULL,
	rif varchar(15) NULL,
	birthdate date NULL,
	ad_sex_id int4 NULL,
	telephone varchar(30) NULL,
	email varchar(50) NULL,
	address varchar(200) NULL,
	datein date NULL,
	ad_bank_id int4 NULL,
	bank_account varchar(50) NULL,
	ad_payroll_id int4 NULL,
	salary varchar NULL,
	date_start_vac date NULL,
	date_end_vac date NULL,
	CONSTRAINT ad_payroll_history_employee_fk FOREIGN KEY (ad_payroll_history_id) REFERENCES system.ad_payroll_history(ad_payroll_history_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".ad_payroll_history_var definition

-- Drop table

-- DROP TABLE "system".ad_payroll_history_var;

CREATE TABLE "system".ad_payroll_history_var (
	ad_payroll_history_var_id serial NOT NULL,
	ad_payroll_history_id int4 NOT NULL,
	ad_employee_id int4 NULL,
	ad_variables_id int4 NULL,
	value numeric(20,2) NULL,
	description varchar NULL,
	CONSTRAINT pky_ad_payroll_history_var_id PRIMARY KEY (ad_payroll_history_var_id),
	CONSTRAINT ad_payroll_history_var_fk FOREIGN KEY (ad_payroll_history_id) REFERENCES system.ad_payroll_history(ad_payroll_history_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".ad_relation_us_op definition

-- Drop table

-- DROP TABLE "system".ad_relation_us_op;

CREATE TABLE "system".ad_relation_us_op (
	ad_relation_id int4 NOT NULL DEFAULT nextval('system.relation_us_op_ad_relation_id_seq'::regclass),
	ad_operations_id int4 NULL,
	ad_user_id int4 NULL,
	CONSTRAINT pky_ad_relation_id PRIMARY KEY (ad_relation_id),
	CONSTRAINT fky_ad_operations_id FOREIGN KEY (ad_operations_id) REFERENCES system.ad_operations(ad_operations_id),
	CONSTRAINT fky_ad_user_id FOREIGN KEY (ad_user_id) REFERENCES system.ad_user(ad_user_id)
);


-- "system".ad_savings_bank definition

-- Drop table

-- DROP TABLE "system".ad_savings_bank;

CREATE TABLE "system".ad_savings_bank (
	ad_savings_bank_id serial NOT NULL,
	created timestamp(0) NOT NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	isactive varchar(1) NULL,
	ad_employee_id int4 NULL,
	datein date NULL,
	saving_amount numeric(20,2) NULL,
	amount_out numeric(20,2) NULL,
	ad_org_id int4 NULL,
	CONSTRAINT ad_savings_bank_pk PRIMARY KEY (ad_savings_bank_id),
	CONSTRAINT ad_savings_bank_un UNIQUE (ad_employee_id),
	CONSTRAINT ad_savings_bank_fk FOREIGN KEY (ad_employee_id) REFERENCES system.ad_employee(ad_employee_id)
);


-- "system".ad_savings_bank_det definition

-- Drop table

-- DROP TABLE "system".ad_savings_bank_det;

CREATE TABLE "system".ad_savings_bank_det (
	ad_savings_bank_det_id serial NOT NULL,
	ad_savings_bank_id int4 NULL,
	ad_payroll_history_id int4 NULL,
	retention numeric(20,2) NULL DEFAULT 0,
	retained_capital numeric(20,2) NULL DEFAULT 0,
	interest_rate numeric(20,2) NULL,
	accrued_interest numeric(20,2) NULL DEFAULT 0,
	retained_accrued numeric(20,2) NULL DEFAULT 0,
	retirement int4 NULL DEFAULT 0,
	accumulated_retirement numeric(20,2) NULL DEFAULT 0,
	balance numeric(20,2) NULL DEFAULT 0,
	CONSTRAINT ad_savings_bank_det_pk PRIMARY KEY (ad_savings_bank_det_id),
	CONSTRAINT ad_savings_bank_det_fk FOREIGN KEY (ad_savings_bank_id) REFERENCES system.ad_savings_bank(ad_savings_bank_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT ad_savings_bank_det_fk_2 FOREIGN KEY (ad_payroll_history_id) REFERENCES system.ad_payroll_history(ad_payroll_history_id)
);


-- "system".ad_savings_bank_retirement definition

-- Drop table

-- DROP TABLE "system".ad_savings_bank_retirement;

CREATE TABLE "system".ad_savings_bank_retirement (
	ad_savings_bank_retirement_id serial NOT NULL,
	created timestamp(0) NULL,
	createdby int4 NULL,
	updated timestamp(0) NULL,
	updatedby int4 NULL,
	ad_employee_id int4 NULL,
	ad_savings_bank_id int4 NULL,
	ad_savings_bank_det_id int4 NULL,
	start_date date NULL,
	description varchar NULL,
	retirement numeric(20,2) NULL,
	CONSTRAINT ad_savings_bank_retirement_pk PRIMARY KEY (ad_savings_bank_retirement_id),
	CONSTRAINT ad_savings_bank_retirement_un UNIQUE (ad_savings_bank_det_id),
	CONSTRAINT ad_savings_bank_retirement_fk FOREIGN KEY (ad_savings_bank_id) REFERENCES system.ad_savings_bank(ad_savings_bank_id),
	CONSTRAINT ad_savings_bank_retirement_fk_1 FOREIGN KEY (ad_employee_id) REFERENCES system.ad_employee(ad_employee_id),
	CONSTRAINT ad_savings_bank_retirement_fk_2 FOREIGN KEY (ad_savings_bank_det_id) REFERENCES system.ad_savings_bank_det(ad_savings_bank_det_id)
);


-- "system".ad_session definition

-- Drop table

-- DROP TABLE "system".ad_session;

CREATE TABLE "system".ad_session (
	ad_session_id int4 NOT NULL DEFAULT nextval('system.ad_notifications_ad_notifications_id_seq'::regclass),
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NULL,
	created timestamp(0) NULL,
	createdby int4 NOT NULL,
	updated timestamp(0) NULL,
	updatedby int4 NOT NULL,
	ad_user_id int4 NULL,
	CONSTRAINT ad_session_fk FOREIGN KEY (ad_user_id) REFERENCES system.ad_user(ad_user_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".ad_state definition

-- Drop table

-- DROP TABLE "system".ad_state;

CREATE TABLE "system".ad_state (
	ad_state_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	ad_country_id int4 NOT NULL,
	"name" varchar(50) NOT NULL,
	CONSTRAINT pky_ad_state_id PRIMARY KEY (ad_state_id),
	CONSTRAINT fky_ad_country_id FOREIGN KEY (ad_country_id) REFERENCES system.ad_country(ad_country_id)
);


-- "system".charge_det definition

-- Drop table

-- DROP TABLE "system".charge_det;

CREATE TABLE "system".charge_det (
	charge_det_id serial NOT NULL,
	charge_id int4 NULL,
	payment_type_id int4 NULL,
	reference varchar NULL,
	amount numeric(20,2) NULL,
	amount_om numeric(20,2) NULL,
	CONSTRAINT charge_det_id PRIMARY KEY (charge_det_id),
	CONSTRAINT charge_det_fk FOREIGN KEY (charge_id) REFERENCES system.charge(charge_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".charge_invoice definition

-- Drop table

-- DROP TABLE "system".charge_invoice;

CREATE TABLE "system".charge_invoice (
	charge_invoice_id serial NOT NULL,
	charge_id int4 NULL,
	invoice_id int4 NULL,
	rate_id int4 NULL,
	nroref varchar NULL,
	rate_amount numeric(20,2) NULL,
	amount numeric(20,2) NULL,
	date_start timestamp NULL,
	CONSTRAINT charge_invoice_id PRIMARY KEY (charge_invoice_id),
	CONSTRAINT charge_invoice_fk FOREIGN KEY (charge_id) REFERENCES system.charge(charge_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".container_control_det definition

-- Drop table

-- DROP TABLE "system".container_control_det;

CREATE TABLE "system".container_control_det (
	container_control_det_id int4 NOT NULL DEFAULT nextval('system.import_quote_det_import_quote_det_id_seq'::regclass),
	container_control_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	package varchar NOT NULL,
	quantity numeric(20,2) NOT NULL,
	price numeric(20,2) NOT NULL,
	sub_total numeric(20,2) NOT NULL,
	packing int4 NOT NULL,
	pallets int4 NOT NULL,
	CONSTRAINT import_quote_det_pk PRIMARY KEY (container_control_det_id),
	CONSTRAINT import_quote_det_fk FOREIGN KEY (container_control_id) REFERENCES system.container_control(container_control_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".credit_note_det definition

-- Drop table

-- DROP TABLE "system".credit_note_det;

CREATE TABLE "system".credit_note_det (
	credit_note_det_id serial NOT NULL,
	credit_note_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	price numeric(20,2) NOT NULL,
	discount_percent_id int4 NOT NULL,
	tax_id int4 NOT NULL,
	total numeric(20,2) NOT NULL,
	CONSTRAINT credit_note_det_pk PRIMARY KEY (credit_note_det_id),
	CONSTRAINT credit_note_det_fk FOREIGN KEY (credit_note_id) REFERENCES system.credit_note(credit_note_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT credit_note_det_fk1 FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id)
);


-- "system".daily_closing_det definition

-- Drop table

-- DROP TABLE "system".daily_closing_det;

CREATE TABLE "system".daily_closing_det (
	daily_closing_det_id serial NOT NULL,
	daily_closing_id int4 NULL,
	payment_type_id int4 NULL,
	c_currency_id int4 NULL,
	theoretical numeric(20,2) NULL,
	physical numeric(20,2) NULL,
	difference numeric(20,2) NULL,
	turned numeric(20,2) NULL,
	CONSTRAINT daily_closing_det_pk PRIMARY KEY (daily_closing_det_id),
	CONSTRAINT daily_closing_det_fk FOREIGN KEY (daily_closing_id) REFERENCES system.daily_closing(daily_closing_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".delivery_note_det definition

-- Drop table

-- DROP TABLE "system".delivery_note_det;

CREATE TABLE "system".delivery_note_det (
	delivery_note_det_id serial NOT NULL,
	delivery_note_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	price numeric(20,2) NOT NULL,
	discount_percent_id int4 NOT NULL,
	tax_id int4 NOT NULL,
	total numeric(20,2) NOT NULL,
	CONSTRAINT delivery_note_det_pk PRIMARY KEY (delivery_note_det_id),
	CONSTRAINT delivery_note_det_fk FOREIGN KEY (delivery_note_id) REFERENCES system.delivery_note(delivery_note_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT delivery_note_det_fk1 FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id)
);


-- "system".inventory_adjustment_det definition

-- Drop table

-- DROP TABLE "system".inventory_adjustment_det;

CREATE TABLE "system".inventory_adjustment_det (
	inventory_adjustment_det_id serial NOT NULL,
	inventory_adjustment_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	"cost" numeric(10,2) NULL,
	total_cost numeric(10,2) NULL,
	price numeric(20,2) NULL,
	CONSTRAINT inventory_adjustment_det_pk PRIMARY KEY (inventory_adjustment_det_id),
	CONSTRAINT inventory_adjustment_det_fk FOREIGN KEY (inventory_adjustment_id) REFERENCES system.inventory_adjustment(inventory_adjustment_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT inventory_adjustment_det_fk1 FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id)
);


-- "system".inventory_load_det definition

-- Drop table

-- DROP TABLE "system".inventory_load_det;

CREATE TABLE "system".inventory_load_det (
	inventory_load_det_id serial NOT NULL,
	inventory_load_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	"cost" numeric(10,2) NULL,
	total_cost numeric(10,2) NULL,
	price numeric(20,2) NULL,
	CONSTRAINT inventory_load_det_pk PRIMARY KEY (inventory_load_det_id),
	CONSTRAINT inventory_load_det_fk FOREIGN KEY (inventory_load_id) REFERENCES system.inventory_load(inventory_load_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT inventory_load_det_fk1 FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id)
);


-- "system".invoice_det definition

-- Drop table

-- DROP TABLE "system".invoice_det;

CREATE TABLE "system".invoice_det (
	invoice_det_id serial NOT NULL,
	invoice_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	price numeric(20,2) NOT NULL,
	discount_percent_id int4 NOT NULL,
	tax_id int4 NOT NULL,
	total numeric(20,2) NOT NULL,
	CONSTRAINT invoice_det_pk PRIMARY KEY (invoice_det_id),
	CONSTRAINT invoice_det_fk FOREIGN KEY (invoice_id) REFERENCES system.invoice(invoice_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT invoice_det_fk1 FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id)
);


-- "system".m_inventory_mov_det definition

-- Drop table

-- DROP TABLE "system".m_inventory_mov_det;

CREATE TABLE "system".m_inventory_mov_det (
	m_inventory_mov_det_id serial NOT NULL,
	m_product_id int4 NOT NULL,
	quantity int4 NOT NULL,
	m_warehouse_id_out int4 NOT NULL,
	m_inventory_mov_id int4 NOT NULL,
	c_uom_id int4 NULL,
	"cost" numeric(20,2) NULL,
	price numeric(20,2) NULL,
	total_cost numeric(20,2) NULL,
	CONSTRAINT m_inventory_mov_det_pk PRIMARY KEY (m_inventory_mov_det_id),
	CONSTRAINT m_inventory_mov_det_fk FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id),
	CONSTRAINT m_inventory_mov_det_fk1 FOREIGN KEY (m_inventory_mov_id) REFERENCES system.m_inventory_mov(m_inventory_mov_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- "system".m_product_cost_price definition

-- Drop table

-- DROP TABLE "system".m_product_cost_price;

CREATE TABLE "system".m_product_cost_price (
	m_product_cost_price_id serial NOT NULL,
	"cost" numeric NULL,
	date_cost date NULL,
	price numeric NULL,
	date_price date NULL,
	utility numeric NULL,
	cost_om numeric NULL,
	date_cost_om date NULL,
	price_om numeric NULL,
	date_price_om date NULL,
	utility_om numeric NULL,
	m_product_id int4 NULL,
	CONSTRAINT m_product_cost_price_pk PRIMARY KEY (m_product_cost_price_id),
	CONSTRAINT m_product_cost_price_fk FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE INDEX m_product_cost_price_m_product_cost_price_id_idx ON system.m_product_cost_price USING btree (m_product_cost_price_id);


-- "system".m_product_stock definition

-- Drop table

-- DROP TABLE "system".m_product_stock;

CREATE TABLE "system".m_product_stock (
	m_product_stock_id serial NOT NULL,
	stock numeric NULL DEFAULT 0,
	stock_comp numeric NULL DEFAULT 0,
	stock_lleg numeric NULL DEFAULT 0,
	stock_desp numeric NULL DEFAULT 0,
	m_product_id int4 NOT NULL,
	m_warehouse_id int4 NULL,
	CONSTRAINT m_product_stock_pk PRIMARY KEY (m_product_stock_id),
	CONSTRAINT m_product_stock_fk FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE INDEX m_product_stock_m_product_stock_id_idx ON system.m_product_stock USING btree (m_product_stock_id);


-- "system".orders_det definition

-- Drop table

-- DROP TABLE "system".orders_det;

CREATE TABLE "system".orders_det (
	orders_det_id serial NOT NULL,
	orders_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	price numeric(20,2) NOT NULL,
	discount_percent_id int4 NOT NULL,
	tax_id int4 NOT NULL,
	total numeric(20,2) NOT NULL,
	CONSTRAINT orders_det_pk PRIMARY KEY (orders_det_id),
	CONSTRAINT orders_det_fk FOREIGN KEY (orders_id) REFERENCES system.orders(orders_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT orders_det_fk1 FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id)
);


-- "system".payment_type definition

-- Drop table

-- DROP TABLE "system".payment_type;

CREATE TABLE "system".payment_type (
	payment_type_id serial NOT NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby int4 NOT NULL,
	updated timestamp NOT NULL,
	updatedby int4 NOT NULL,
	"name" varchar(60) NOT NULL,
	description varchar(250) NOT NULL,
	"percent" numeric(20,2) NULL,
	c_currency_id int4 NULL,
	CONSTRAINT payment_type_pkey PRIMARY KEY (payment_type_id),
	CONSTRAINT payment_type_fk FOREIGN KEY (c_currency_id) REFERENCES system.c_currency(c_currency_id)
);


-- "system".quotation_det definition

-- Drop table

-- DROP TABLE "system".quotation_det;

CREATE TABLE "system".quotation_det (
	quotation_det_id serial NOT NULL,
	quotation_id int4 NOT NULL,
	m_product_id int4 NOT NULL,
	code varchar NULL,
	art_desc varchar NULL,
	m_warehouse_id int4 NOT NULL,
	quantity numeric(20,2) NOT NULL,
	c_uom_id int4 NOT NULL,
	price numeric(20,2) NOT NULL,
	discount_percent_id int4 NOT NULL,
	tax_id int4 NOT NULL,
	total numeric(20,2) NOT NULL,
	CONSTRAINT quotation_det_pk PRIMARY KEY (quotation_det_id),
	CONSTRAINT quotation_det_fk FOREIGN KEY (quotation_id) REFERENCES system.quotation(quotation_id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT quotation_det_fk1 FOREIGN KEY (m_product_id) REFERENCES system.m_product(m_product_id)
);


-- "system".status_container definition

-- Drop table

-- DROP TABLE "system".status_container;

CREATE TABLE "system".status_container (
	status_container_id serial NOT NULL,
	container_control_id int4 NULL,
	ad_org_id int4 NULL,
	created timestamp NULL,
	createdby int4 NULL,
	updated timestamp NULL,
	updatedby int4 NULL,
	isactive varchar NULL,
	description varchar NULL,
	container_reference varchar NULL,
	CONSTRAINT status_container_pk PRIMARY KEY (status_container_id),
	CONSTRAINT status_container_fk FOREIGN KEY (container_control_id) REFERENCES system.container_control(container_control_id)
);


-- "system".ad_city definition

-- Drop table

-- DROP TABLE "system".ad_city;

CREATE TABLE "system".ad_city (
	ad_city_id serial NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	ad_country_id int4 NOT NULL,
	"name" varchar(50) NOT NULL,
	ad_state_id int4 NULL,
	CONSTRAINT pky_ad_city_id PRIMARY KEY (ad_city_id),
	CONSTRAINT fky_ad_country_id FOREIGN KEY (ad_country_id) REFERENCES system.ad_country(ad_country_id),
	CONSTRAINT fky_ad_state_id FOREIGN KEY (ad_state_id) REFERENCES system.ad_state(ad_state_id)
);


-- "system".c_location definition

-- Drop table

-- DROP TABLE "system".c_location;

CREATE TABLE "system".c_location (
	c_location_id serial NOT NULL,
	ad_client_id int4 NULL,
	ad_org_id int4 NOT NULL,
	isactive varchar(1) NOT NULL,
	created timestamp NOT NULL,
	createdby numeric(10) NOT NULL,
	updated timestamp NOT NULL,
	updatedby numeric(10) NOT NULL,
	ad_country_id int4 NOT NULL,
	ad_city_id int4 NOT NULL,
	address varchar(60) NOT NULL,
	postal varchar(60) NOT NULL,
	ad_state_id int4 NULL,
	CONSTRAINT pky_c_location_id PRIMARY KEY (c_location_id),
	CONSTRAINT c_location_ibfk_2 FOREIGN KEY (ad_org_id) REFERENCES system.ad_org(ad_org_id),
	CONSTRAINT c_location_ibfk_3 FOREIGN KEY (ad_country_id) REFERENCES system.ad_country(ad_country_id),
	CONSTRAINT c_location_ibfk_4 FOREIGN KEY (ad_city_id) REFERENCES system.ad_city(ad_city_id),
	CONSTRAINT c_location_ibfk_5 FOREIGN KEY (ad_state_id) REFERENCES system.ad_state(ad_state_id)
);


-- "system".consulta_m_product source

CREATE OR REPLACE VIEW "system".consulta_m_product
AS SELECT a.cod,
    b.name AS organizacion,
    a.m_product_id,
    a.name,
    a.description,
    a.isactive
   FROM system.m_product a
     JOIN system.ad_org b ON b.ad_org_id = a.ad_org_id
  ORDER BY a.m_product_id;


-- "system".consulta_m_warehouse source

CREATE OR REPLACE VIEW "system".consulta_m_warehouse
AS SELECT a.cod,
    b.name AS organizacion,
    a.m_warehouse_id,
    a.name AS almacen,
    a.description,
    a.isactive
   FROM system.m_warehouse a
     JOIN system.ad_org b ON b.ad_org_id = a.ad_org_id
  ORDER BY a.m_warehouse_id DESC;



CREATE OR REPLACE FUNCTION system.active_employee_vacation()
 RETURNS integer
 LANGUAGE plpgsql
AS $function$
DECLARE

myrec RECORD;

BEGIN

FOR myrec IN 
	SELECT A.ad_employee_id FROM system.ad_employee AS A 
	INNER JOIN system.ad_vacation AS B ON (A.ad_employee_id = B.ad_employee_id)
	WHERE A.nom_status_id = '2' AND B.date_end_vac <= current_date LOOP
	
	UPDATE system.ad_employee SET nom_status_id = '1' WHERE ad_employee_id = myrec.ad_employee_id;

END LOOP;

RETURN 0;

END
$function$
;

CREATE OR REPLACE FUNCTION system.select_m_warehouse()
 RETURNS SETOF character varying
 LANGUAGE plpgsql
AS $function$
DECLARE
    reg RECORD;
BEGIN
    FOR REG IN 
	SELECT 
	b.name,
	c.name,
	a.m_warehouse_id,
	a.name,
	a.description,
	a.isactive 
	FROM system.m_warehouse AS a
	INNER JOIN system.ad_client AS b ON (b.ad_client_id = a.ad_client_id)
	INNER JOIN system.ad_org AS c ON (c.ad_org_id = a.ad_org_id) 
    LOOP
       RETURN NEXT reg;
    END LOOP;
    RETURN;
END
$function$
;

CREATE OR REPLACE FUNCTION system.show_create_table(in_schema_name character varying, in_table_name character varying)
 RETURNS text
 LANGUAGE plpgsql
AS $function$
  DECLARE
    -- the ddl we're building
    v_table_ddl text;
    v_nextval text;

    -- data about the target table
    v_table_oid int;

    -- records for looping
    v_column_record record;
    v_constraint_record record;
    v_index_record record;
  BEGIN
    -- grab the oid of the table; https://www.postgresql.org/docs/8.3/catalog-pg-class.html
    SELECT c.oid INTO v_table_oid
    FROM pg_catalog.pg_class c
    LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
    WHERE 1=1
      AND c.relkind = 'r' -- r = ordinary table; https://www.postgresql.org/docs/9.3/catalog-pg-class.html
      AND c.relname = in_table_name -- the table name
      AND n.nspname = in_schema_name; -- the schema

    -- throw an error if table was not found
    IF (v_table_oid IS NULL) THEN
      RAISE EXCEPTION 'table does not exist';
    END IF;

    -- start the create definition
    v_table_ddl := 'CREATE TABLE ' || in_schema_name || '.' || in_table_name || ' (' || E'\n';

    -- define all of the columns in the table; https://stackoverflow.com/a/8153081/3068233
    FOR v_column_record IN
      SELECT
        c.column_name,
        c.data_type,
        c.character_maximum_length,
        c.is_nullable,
        c.column_default
      FROM information_schema.columns c
      WHERE (table_schema, table_name) = (in_schema_name, in_table_name)
      ORDER BY ordinal_position
    loop
      v_nextval := SUBSTRING(v_column_record.column_default,1,7); 
      v_table_ddl := v_table_ddl || '  ' -- note: two char spacer to start, to indent the column
        || v_column_record.column_name || ' '
        || CASE WHEN v_nextval = 'nextval' THEN 'serial' ELSE v_column_record.data_type  END
        || CASE WHEN v_column_record.character_maximum_length IS NOT NULL THEN ('(' || v_column_record.character_maximum_length || ')') ELSE '' END || ' '
        || CASE WHEN v_column_record.is_nullable = 'NO' THEN 'NOT NULL' ELSE 'NULL' END
        || CASE WHEN (v_column_record.column_default IS NOT NULL AND v_nextval != 'nextval') THEN (' DEFAULT ' || v_column_record.column_default) ELSE '' END
        || ',' || E'\n';
    END LOOP;

    -- define all the constraints in the; https://www.postgresql.org/docs/9.1/catalog-pg-constraint.html && https://dba.stackexchange.com/a/214877/75296
    FOR v_constraint_record IN
      SELECT
        con.conname as constraint_name,
        con.contype as constraint_type,
        CASE
          WHEN con.contype = 'p' THEN 1 -- primary key constraint
          WHEN con.contype = 'u' THEN 2 -- unique constraint
          WHEN con.contype = 'f' THEN 3 -- foreign key constraint
          WHEN con.contype = 'c' THEN 4
          ELSE 5
        END as type_rank,
        pg_get_constraintdef(con.oid) as constraint_definition
      FROM pg_catalog.pg_constraint con
      JOIN pg_catalog.pg_class rel ON rel.oid = con.conrelid
      JOIN pg_catalog.pg_namespace nsp ON nsp.oid = connamespace
      WHERE nsp.nspname = in_schema_name
      AND rel.relname = in_table_name
      ORDER BY type_rank
    LOOP
      v_table_ddl := v_table_ddl || '  ' -- note: two char spacer to start, to indent the column
        || 'CONSTRAINT' || ' '
        || v_constraint_record.constraint_name || ' '
        || v_constraint_record.constraint_definition
        || ',' || E'\n';
    END LOOP;

    -- drop the last comma before ending the create statement
    v_table_ddl = substr(v_table_ddl, 0, length(v_table_ddl) - 1) || E'\n';

    -- end the create definition
    v_table_ddl := v_table_ddl || ');' || E'\n';

    -- suffix create statement with all of the indexes on the table
    /*FOR v_index_record IN
      SELECT indexdef
      FROM pg_indexes
      WHERE (schemaname, tablename) = (in_schema_name, in_table_name)
    LOOP
      v_table_ddl := v_table_ddl
        || v_index_record.indexdef
        || ';' || E'\n';
    END LOOP;*/

    -- return the ddl
    RETURN v_table_ddl;
  END;
$function$
;
